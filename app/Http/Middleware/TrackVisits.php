<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Domain\Core\Models\Visit;

class TrackVisits
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Only log GET requests to public pages (ignore admin, debug, up status, lazy loaders)
        if ($request->isMethod('GET') 
            && !$request->is('admin*') 
            && !$request->is('up')
            && !$request->is('lazy-load-sections')
            && !$request->is('_debugbar*')
            && !str_contains($request->url(), 'sitemap')
            && !str_contains($request->url(), 'robots.txt')
        ) {
            try {
                Visit::create([
                    'ip_address' => $request->ip() ?: '127.0.0.1',
                    'user_agent' => $request->userAgent(),
                    'url' => $request->fullUrl(),
                    'visited_at' => now(),
                ]);
            } catch (\Exception $e) {
                // Silently ignore log errors to keep the application running
            }
        }

        return $response;
    }
}
