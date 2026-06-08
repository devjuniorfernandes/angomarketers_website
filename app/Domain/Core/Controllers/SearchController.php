<?php

namespace App\Domain\Core\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        $articles = collect();
        $events = collect();
        $trainings = collect();

        if ($query) {
            $trimmedQuery = trim(strtolower($query));
            if ($trimmedQuery !== '') {
                $log = \App\Domain\Core\Models\SearchLog::firstOrNew(['query' => $trimmedQuery]);
                $log->hits = $log->exists ? $log->hits + 1 : 1;
                $log->save();
            }

            $articles = Article::published()
                ->with(['author', 'category'])
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('subtitle', 'like', "%{$query}%")
                      ->orWhere('body', 'like', "%{$query}%");
                })
                ->latest('published_at')
                ->take(10)
                ->get();

            $events = \App\Domain\Events\Models\Event::published()
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%")
                      ->orWhere('body', 'like', "%{$query}%");
                })
                ->latest('event_date')
                ->take(10)
                ->get();

            $trainings = \App\Domain\Trainings\Models\Training::published()
                ->where(function ($q) use ($query) {
                    $q->where('title', 'like', "%{$query}%")
                      ->orWhere('excerpt', 'like', "%{$query}%")
                      ->orWhere('description', 'like', "%{$query}%")
                      ->orWhere('institution', 'like', "%{$query}%")
                      ->orWhere('instructor', 'like', "%{$query}%");
                })
                ->latest('start_date')
                ->take(10)
                ->get();
        }

        // Fetch trending articles for the sidebar
        $trendingArticles = Article::published()
            ->with(['category'])
            ->orderBy('views_count', 'desc')
            ->take(5)
            ->get();

        return view('pages.search', compact('query', 'articles', 'events', 'trainings', 'trendingArticles'));
    }
}
