<?php

namespace App\Domain\Core\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Articles\Models\Article;
use App\Domain\Events\Models\Event;
use App\Domain\Trainings\Models\Training;

class SEOController extends Controller
{
    /**
     * Generates a dynamic sitemap.xml.
     */
    public function sitemap()
    {
        $articles = Article::published()->latest('published_at')->get();
        $events = Event::published()->latest('event_date')->get();
        $trainings = Training::published()->latest('start_date')->get();

        $content = view('pages.sitemap', compact('articles', 'events', 'trainings'))->render();

        return response($content, 200, [
            'Content-Type' => 'text/xml'
        ]);
    }

    /**
     * Generates robots.txt dynamically.
     */
    public function robots()
    {
        $content = "User-agent: *\n";
        $content .= "Allow: /\n\n";
        $content .= "Sitemap: " . url('/sitemap.xml') . "\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain'
        ]);
    }
}
