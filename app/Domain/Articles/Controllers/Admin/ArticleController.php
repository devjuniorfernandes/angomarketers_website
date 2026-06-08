<?php

namespace App\Domain\Articles\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Article;
use App\Domain\Categories\Models\Category;
use App\Domain\Articles\Models\Author;
use App\Domain\Articles\Actions\CreateArticleAction;
use App\Domain\Articles\Actions\UpdateArticleAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category_id');

        $query = Article::with(['author', 'category'])->latest('published_at');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        $articles = $query->paginate(15)->withQueryString();
        $categories = Category::all();

        return view('admin.articles.index', compact('articles', 'categories', 'search', 'categoryId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('admin.articles.form', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateArticleAction $action)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'reading_time' => 'required|string|max:50',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'body' => 'required|string',
            'image' => 'required|image|max:4096', // Max 4MB
            'featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags' => 'nullable|string',
        ]);

        $action->execute($request->all(), $request->file('image'));

        return redirect()->route('admin.articles.index')->with('success', 'Artigo criado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        $authors = Author::all();
        $tags = $article->tags->pluck('name')->implode(', ');
        return view('admin.articles.form', compact('article', 'categories', 'authors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, UpdateArticleAction $action)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'reading_time' => 'required|string|max:50',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'body' => 'required|string',
            'image' => 'nullable|image|max:4096', // Max 4MB
            'featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags' => 'nullable|string',
        ]);

        $action->execute($article, $request->all(), $request->file('image'));

        return redirect()->route('admin.articles.index')->with('success', 'Artigo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete image file if stored locally
        if ($article->image_path && str_starts_with($article->image_path, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $article->image_path);
            Storage::disk('public')->delete($oldPath);
        }

        $article->delete();

        // Clear web cache to reflect updates
        Cache::flush();

        return redirect()->route('admin.articles.index')->with('success', 'Artigo eliminado com sucesso!');
    }
}
