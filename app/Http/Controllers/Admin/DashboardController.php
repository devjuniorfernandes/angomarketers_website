<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Article;
use App\Domain\Categories\Models\Category;
use App\Domain\Articles\Models\Comment;
use App\Domain\Newsletter\Models\Subscriber;
use App\Domain\Events\Models\Event;
use App\Domain\Trainings\Models\Training;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles_count' => Article::count(),
            'categories_count' => Category::count(),
            'pending_comments_count' => Comment::where('is_approved', false)->count(),
            'subscribers_count' => Subscriber::count(),
            'events_count' => Event::count(),
            'trainings_count' => Training::count(),
            'visits_count' => \App\Domain\Core\Models\Visit::count(),
        ];

        // Fetch latest articles
        $recentArticles = Article::with(['author', 'category'])
            ->latest()
            ->take(5)
            ->get();

        // Fetch latest pending comments
        $pendingComments = Comment::with('article')
            ->where('is_approved', false)
            ->latest()
            ->take(5)
            ->get();

        // Fetch top viewed contents
        $topArticles = Article::orderBy('views_count', 'desc')->take(3)->get();
        $topEvents = Event::orderBy('views_count', 'desc')->take(3)->get();
        $topTrainings = Training::orderBy('views_count', 'desc')->take(3)->get();

        // Fetch popular search terms
        $popularSearches = \App\Domain\Core\Models\SearchLog::orderBy('hits', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('stats', 'recentArticles', 'pendingComments', 'topArticles', 'topEvents', 'topTrainings', 'popularSearches'));
    }
}
