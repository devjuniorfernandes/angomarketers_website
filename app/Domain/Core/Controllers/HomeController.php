<?php

namespace App\Domain\Core\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Article;
use App\Domain\Categories\Models\Category;
use App\Domain\Events\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Cache homepage content for high performance
        $data = Cache::remember('home_data_slider_v1', 600, function () {
            // 1. Fetch featured article for Hero (fallback to latest)
            $heroArticle = Article::published()
                ->with(['author', 'category'])
                ->where('featured', true)
                ->latest('published_at')
                ->first();

            if (!$heroArticle) {
                $heroArticle = Article::published()
                    ->with(['author', 'category'])
                    ->latest('published_at')
                    ->first();
            }

            $heroId = $heroArticle ? $heroArticle->id : 0;

            // 1b. Fetch unified slider items (Articles, Events, and Trainings)
            $sliderItems = collect();

            $dbSliderItems = \App\Domain\Core\Models\SliderItem::orderBy('order', 'asc')->get();
            if ($dbSliderItems->isNotEmpty()) {
                foreach ($dbSliderItems as $item) {
                    $sliderItems->push((object)[
                        'type' => 'custom',
                        'title' => $item->title,
                        'subtitle' => $item->subtitle,
                        'image_path' => $item->image_path,
                        'badge' => $item->badge ?: 'Destaque',
                        'badge_color' => $item->badge_color ?: 'bg-primary',
                        'url' => $item->url,
                        'author' => 'AngoMarketers',
                        'date' => null,
                        'extra' => null,
                    ]);
                }
            } else {
                // Articles for slider (up to 3 featured)
                $sliderArticles = Article::published()
                    ->with(['author', 'category'])
                    ->where('featured', true)
                    ->latest('published_at')
                    ->take(3)
                    ->get();

                if ($sliderArticles->isEmpty()) {
                    $sliderArticles = Article::published()
                        ->with(['author', 'category'])
                        ->latest('published_at')
                        ->take(3)
                        ->get();
                }

                foreach ($sliderArticles as $article) {
                    $sliderItems->push((object)[
                        'type' => 'article',
                        'title' => $article->title,
                        'subtitle' => $article->subtitle,
                        'image_path' => $article->image_path ?: 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=1200',
                        'badge' => $article->category->name ?? 'Notícia',
                        'badge_color' => 'bg-primary',
                        'url' => route('article', $article->slug),
                        'author' => $article->author->name ?? 'Redação',
                        'date' => $article->published_at ? $article->published_at->format('d/m/Y') : '',
                        'extra' => $article->reading_time,
                    ]);
                }

                // Events for slider (up to 2 featured/upcoming)
                $sliderEvents = Event::published()
                    ->where('featured', true)
                    ->latest('event_date')
                    ->take(2)
                    ->get();

                if ($sliderEvents->isEmpty()) {
                    $sliderEvents = Event::published()
                        ->where('event_date', '>=', now())
                        ->orderBy('event_date', 'asc')
                        ->take(2)
                        ->get();
                }

                foreach ($sliderEvents as $event) {
                    $sliderItems->push((object)[
                        'type' => 'event',
                        'title' => $event->title,
                        'subtitle' => $event->description,
                        'image_path' => $event->image_path ?: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?q=80&w=1200',
                        'badge' => 'Evento',
                        'badge_color' => 'bg-emerald-600',
                        'url' => route('events.show', $event->slug),
                        'author' => $event->organizer ?: 'Organização',
                        'date' => $event->event_date ? $event->event_date->format('d/m/Y H:i') : '',
                        'extra' => $event->location,
                    ]);
                }

                // Trainings for slider (up to 2 featured)
                $sliderTrainings = \App\Domain\Trainings\Models\Training::published()
                    ->featured()
                    ->latest('start_date')
                    ->take(2)
                    ->get();

                if ($sliderTrainings->isEmpty()) {
                    $sliderTrainings = \App\Domain\Trainings\Models\Training::published()
                        ->latest('start_date')
                        ->take(2)
                        ->get();
                }

                foreach ($sliderTrainings as $training) {
                    $sliderItems->push((object)[
                        'type' => 'training',
                        'title' => $training->title,
                        'subtitle' => $training->excerpt,
                        'image_path' => $training->cover_image ?: 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=1200',
                        'badge' => 'Formação',
                        'badge_color' => 'bg-indigo-600',
                        'url' => route('trainings.show', $training->slug),
                        'author' => $training->institution,
                        'date' => $training->start_date ? $training->start_date->format('d/m/Y') : '',
                        'extra' => $training->duration . ($training->price > 0 ? ' • ' . number_format($training->price, 2, ',', '.') . ' AOA' : ' • Gratuito'),
                    ]);
                }
            }

            // 2. Fetch latest articles (excluding the hero one)
            $latestArticles = Article::published()
                ->with(['author', 'category'])
                ->where('id', '!=', $heroId)
                ->latest('published_at')
                ->take(8)
                ->get();

            // 3. Fetch trending articles (by views_count desc)
            $trendingArticles = Article::published()
                ->with(['category'])
                ->orderBy('views_count', 'desc')
                ->latest('published_at')
                ->take(10)
                ->get();

            // 4. Fetch group of articles for specific category blocks
            $categoriesData = Category::with(['articles' => function ($query) use ($heroId) {
                $query->published()
                    ->with(['author'])
                    ->where('articles.id', '!=', $heroId)
                    ->latest('published_at')
                    ->take(4);
            }])->whereIn('slug', ['marketing', 'tecnologia', 'ia', 'negocios', 'startups'])
               ->get()
               ->keyBy('name');

            // Adapt categories data to view-compatible structure
            $categories = [];
            foreach ($categoriesData as $catName => $category) {
                $categories[$catName] = $category->articles;
            }

            // 5. Fetch upcoming events
            $upcomingEvents = Event::published()
                ->where('event_date', '>=', now())
                ->orderBy('event_date', 'asc')
                ->take(3)
                ->get();

            // 6. Fetch featured trainings
            $featuredTrainings = \App\Domain\Trainings\Models\Training::published()
                ->featured()
                ->latest('start_date')
                ->take(3)
                ->get();

            if ($featuredTrainings->isEmpty()) {
                $featuredTrainings = \App\Domain\Trainings\Models\Training::published()
                    ->latest('start_date')
                    ->take(3)
                    ->get();
            }

            return compact('heroArticle', 'latestArticles', 'trendingArticles', 'categories', 'upcomingEvents', 'featuredTrainings', 'sliderItems');
        });

        // Fetch homepage video URL outside of cache to allow live changes
        $videoUrl = \App\Domain\Core\Models\Setting::get('homepage_video_url');
        $videoShow = \App\Domain\Core\Models\Setting::get('homepage_video_show', '0') == '1';
        $data['homepage_video_url'] = $videoShow ? $this->getYoutubeEmbedUrl($videoUrl) : null;

        $data['ad_super_billboard'] = [
            'image' => \App\Domain\Core\Models\Setting::get('ad_super_billboard_image'),
            'url' => \App\Domain\Core\Models\Setting::get('ad_super_billboard_url'),
            'show' => \App\Domain\Core\Models\Setting::get('ad_super_billboard_show', '0') == '1',
        ];

        $data['ad_slim_leaderboard'] = [
            'image' => \App\Domain\Core\Models\Setting::get('ad_slim_leaderboard_image'),
            'url' => \App\Domain\Core\Models\Setting::get('ad_slim_leaderboard_url'),
            'show' => \App\Domain\Core\Models\Setting::get('ad_slim_leaderboard_show', '0') == '1',
        ];

        return view('pages.home', $data);
    }

    /**
     * Parse YouTube link and convert it into a standard embed URL.
     */
    private function getYoutubeEmbedUrl($url)
    {
        if (!$url) return null;

        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';

        if (preg_match($pattern, $url, $matches)) {
            return "https://www.youtube.com/embed/" . $matches[1];
        }

        return $url;
    }

    /**
     * Lazy loading endpoint for heavy sections: Video and Podcasts.
     * Fetched asynchronously by Alpine.js when scrolling.
     */
    public function lazyLoadSections()
    {
        // Return view partial for these heavy sections
        return view('pages.partials.heavy-sections');
    }
}
