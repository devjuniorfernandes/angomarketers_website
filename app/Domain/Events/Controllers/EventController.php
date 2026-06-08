<?php

namespace App\Domain\Events\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Events\Models\Event;
use App\Domain\Articles\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    /**
     * Display a listing of upcoming and past events.
     */
    public function index()
    {
        $page = request()->get('page', 1);
        $cacheKey = "events_index_page_{$page}";

        $data = Cache::remember($cacheKey, 600, function () {
            // Upcoming events (future events)
            $upcomingEvents = Event::published()
                ->where('event_date', '>=', now())
                ->orderBy('event_date', 'asc')
                ->get();

            // Past events (past events with summary and gallery)
            $pastEvents = Event::published()
                ->where('event_date', '<', now())
                ->orderBy('event_date', 'desc')
                ->paginate(6);

            // Trending articles for the sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->latest('published_at')
                ->take(5)
                ->get();

            return [
                'upcomingEvents' => $upcomingEvents,
                'pastEvents' => $pastEvents,
                'trendingArticles' => $trendingArticles,
            ];
        });

        return view('pages.events.index', $data);
    }

    /**
     * Display details of a specific event.
     */
    public function show($slug)
    {
        $event = Event::published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views count
        $event->timestamps = false;
        $event->increment('views_count');

        $cacheKey = "event_detail_{$slug}";

        $data = Cache::remember($cacheKey, 600, function () use ($event) {
            $event->load('photos');

            // Trending articles for sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->latest('published_at')
                ->take(5)
                ->get();

            // Upcoming events for sidebar
            $upcomingEvents = Event::published()
                ->where('event_date', '>=', now())
                ->where('id', '!=', $event->id)
                ->orderBy('event_date', 'asc')
                ->take(3)
                ->get();

            return [
                'trendingArticles' => $trendingArticles,
                'upcomingEvents' => $upcomingEvents,
            ];
        });

        $data['event'] = $event;

        return view('pages.events.show', $data);
    }
}
