<?php

namespace App\Domain\Articles\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Author;
use App\Domain\Articles\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AuthorController extends Controller
{
    public function show($slug)
    {
        $page = request()->get('page', 1);
        $cacheKey = "author_page_{$slug}_page_{$page}";

        $data = Cache::remember($cacheKey, 600, function () use ($slug) {
            $author = Author::where('slug', $slug)->firstOrFail();

            // Fetch articles written by this author, paginated
            $articles = Article::published()
                ->with(['author', 'category'])
                ->where('author_id', $author->id)
                ->latest('published_at')
                ->paginate(9);

            // Fetch trending articles for the sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->latest('published_at')
                ->take(5)
                ->get();

            return [
                'author' => $author,
                'authorName' => $author->name,
                'articles' => $articles,
                'trendingArticles' => $trendingArticles,
            ];
        });

        return view('pages.author', $data);
    }
}
