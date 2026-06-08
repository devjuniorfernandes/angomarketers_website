<?php

namespace App\Domain\Trainings\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Trainings\Models\Training;
use App\Domain\Trainings\Models\TrainingCategory;
use App\Domain\Trainings\Actions\CreateTrainingAction;
use App\Domain\Trainings\Actions\UpdateTrainingAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::with('categories')->latest()->paginate(15);
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TrainingCategory::all();
        return view('admin.trainings.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateTrainingAction $action)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'required|string',
            'institution' => 'required|string|max:255',
            'instructor' => 'nullable|string|max:255',
            'duration' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'location' => 'nullable|required_if:mode,presencial,híbrido|string|max:255',
            'mode' => 'required|in:online,presencial,híbrido',
            'registration_link' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:draft,published,scheduled',
            'featured' => 'nullable|boolean',
            'cover_image' => 'nullable|image|max:2048', // Max 2MB
            'categories' => 'required|array',
            'categories.*' => 'exists:training_categories,id',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $action->execute($request->all(), $request->file('cover_image'));

        return redirect()->route('admin.trainings.index')->with('success', 'Formação criada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        $categories = TrainingCategory::all();
        // Load tags as comma-separated string for easy input field usage
        $tags = $training->tags->pluck('name')->implode(', ');
        return view('admin.trainings.form', compact('training', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training, UpdateTrainingAction $action)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'description' => 'required|string',
            'institution' => 'required|string|max:255',
            'instructor' => 'nullable|string|max:255',
            'duration' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'location' => 'nullable|required_if:mode,presencial,híbrido|string|max:255',
            'mode' => 'required|in:online,presencial,híbrido',
            'registration_link' => 'nullable|url|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:draft,published,scheduled',
            'featured' => 'nullable|boolean',
            'cover_image' => 'nullable|image|max:2048', // Max 2MB
            'categories' => 'required|array',
            'categories.*' => 'exists:training_categories,id',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        $action->execute($training, $request->all(), $request->file('cover_image'));

        return redirect()->route('admin.trainings.index')->with('success', 'Formação atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        // Delete image if exists
        if ($training->cover_image && str_starts_with($training->cover_image, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $training->cover_image);
            Storage::disk('public')->delete($oldPath);
        }

        $training->categories()->detach();
        $training->tags()->detach();
        $training->delete();

        // Clear web cache
        Cache::flush();

        return redirect()->route('admin.trainings.index')->with('success', 'Formação eliminada com sucesso!');
    }
}
