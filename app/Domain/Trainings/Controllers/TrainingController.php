<?php

namespace App\Domain\Trainings\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Trainings\Models\Training;
use App\Domain\Trainings\Models\TrainingCategory;
use App\Domain\Articles\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TrainingController extends Controller
{
    /**
     * Display a listing of published trainings.
     */
    public function index(Request $request)
    {
        $categorySlug = $request->input('category') ?: $request->input('categoria');
        $mode = $request->input('mode') ?: $request->input('modalidade');
        
        $dbMode = $mode;
        if (strtolower($dbMode) === 'hibrido') {
            $dbMode = 'híbrido';
        }

        $page = $request->input('page', 1);

        $cacheKey = "trainings_index_{$categorySlug}_{$mode}_page_{$page}";

        $data = Cache::remember($cacheKey, 600, function () use ($categorySlug, $dbMode) {
            $query = Training::published()->latest('start_date');

            if ($categorySlug) {
                $query->whereHas('categories', function ($q) use ($categorySlug) {
                    $q->where('slug', $categorySlug);
                });
            }

            if ($dbMode) {
                $query->where('mode', $dbMode);
            }

            $trainings = $query->paginate(9)->withQueryString();

            // Fetch trending articles for the sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->orderBy('views_count', 'desc')
                ->take(5)
                ->get();

            $categories = TrainingCategory::has('trainings')->get();

            return [
                'trainings' => $trainings,
                'trendingArticles' => $trendingArticles,
                'categories' => $categories,
            ];
        });

        return view('pages.trainings.index', array_merge($data, [
            'selectedCategory' => $categorySlug,
            'selectedMode' => $mode
        ]));
    }

    /**
     * Display the specified training.
     */
    public function show($slug)
    {
        $training = Training::published()->where('slug', $slug)->firstOrFail();
        
        // Increment views count outside of cache for accuracy
        $training->increment('views_count');

        $cacheKey = "training_detail_related_{$slug}";

        $data = Cache::remember($cacheKey, 600, function () use ($training) {
            // Fetch related trainings (same categories)
            $categoryIds = $training->categories->pluck('id')->toArray();
            $relatedTrainings = Training::published()
                ->where('id', '!=', $training->id)
                ->whereHas('categories', function ($q) use ($categoryIds) {
                    $q->whereIn('training_categories.id', $categoryIds);
                })
                ->take(3)
                ->get();

            // Trending articles for the sidebar
            $trendingArticles = Article::published()
                ->with(['category'])
                ->orderBy('views_count', 'desc')
                ->take(5)
                ->get();

            return [
                'relatedTrainings' => $relatedTrainings,
                'trendingArticles' => $trendingArticles,
            ];
        });

        return view('pages.trainings.show', array_merge($data, [
            'training' => $training
        ]));
    }
}
