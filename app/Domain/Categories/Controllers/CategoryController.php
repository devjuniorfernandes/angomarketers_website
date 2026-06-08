<?php

namespace App\Domain\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Categories\Models\Category;
use App\Domain\Articles\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $page = request()->get('page', 1);
        
        // Cache Category page data (cleared when articles/categories change)
        $cacheKey = "category_page_{$slug}_page_{$page}";
        
        $data = Cache::remember($cacheKey, 600, function () use ($slug) {
            $category = Category::where('slug', $slug)->firstOrFail();

            // Fetch articles belonging to the category, paginated (9 per page)
            $articles = Article::published()
                ->with(['author', 'category'])
                ->where('category_id', $category->id)
                ->latest('published_at')
                ->paginate(9);

            // Fetch trending articles for the sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->latest('published_at')
                ->take(5)
                ->get();

            return [
                'category' => $category,
                'categoryName' => $category->name,
                'articles' => $articles,
                'trendingArticles' => $trendingArticles,
            ];
        });

        return view('pages.category', $data);
    }
}
