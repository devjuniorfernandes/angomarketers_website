<?php

namespace App\Domain\Articles\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Article;
use App\Domain\Articles\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categorySlug = $request->input('category') ?: $request->input('categoria');
        $page = $request->input('page', 1);

        $cacheKey = "news_index_{$categorySlug}_page_{$page}";

        $data = Cache::remember($cacheKey, 600, function () use ($categorySlug) {
            $query = Article::published()->with(['author', 'category'])->latest('published_at');

            if ($categorySlug) {
                $query->whereHas('category', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            }

            $articles = $query->paginate(9)->withQueryString();

            $trendingArticles = Article::published()
                ->with(['category'])
                ->orderBy('views_count', 'desc')
                ->take(5)
                ->get();

            return [
                'articles' => $articles,
                'trendingArticles' => $trendingArticles,
            ];
        });

        return view('pages.news.index', array_merge($data, [
            'selectedCategory' => $categorySlug
        ]));
    }

    public function show($slug)
    {
        // Increment views count outside of cache
        $article = Article::published()->where('slug', $slug)->firstOrFail();
        $article->increment('views_count');

        // Fetch article detail page with caching
        $cacheKey = "article_page_{$slug}";
        
        $data = Cache::remember($cacheKey, 600, function () use ($article) {
            // Refresh relation loading
            $article->load(['author', 'category', 'approvedComments' => function ($query) {
                $query->whereNull('parent_id')->with('approvedReplies');
            }]);

            // Format author bio for view compatibility
            $authorBio = [
                'name' => $article->author->name,
                'avatar' => $article->author->avatar_path ?? null,
                'role' => $article->author->role ?? 'Editor',
                'bio' => $article->author->bio ?? '',
            ];

            // Fetch related articles in same category
            $relatedArticles = Article::published()
                ->with(['author', 'category'])
                ->where('category_id', $article->category_id)
                ->where('id', '!=', $article->id)
                ->latest('published_at')
                ->take(3)
                ->get();

            // Fetch trending list for sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->orderBy('views_count', 'desc')
                ->take(5)
                ->get();

            return [
                'article' => $article,
                'authorBio' => $authorBio,
                'relatedArticles' => $relatedArticles,
                'trendingArticles' => $trendingArticles,
            ];
        });

        return view('pages.article', $data);
    }

    public function storeComment(Request $request, $slug)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'author_email' => 'required|email|max:255',
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $article = Article::where('slug', $slug)->firstOrFail();

        Comment::create([
            'article_id' => $article->id,
            'author_name' => $request->input('author_name'),
            'author_email' => $request->input('author_email'),
            'content' => $request->input('content'),
            'parent_id' => $request->input('parent_id'),
            'is_approved' => false, // Default is false, needs admin approval
        ]);

        // Clear this article's cache
        Cache::forget("article_page_{$slug}");

        return back()->with('comment_success', 'O seu comentário foi submetido com sucesso e aguarda moderação!');
    }
}
