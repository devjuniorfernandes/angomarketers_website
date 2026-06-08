<?php

namespace App\Domain\Trainings\Actions;

use App\Domain\Trainings\Models\Training;
use App\Domain\Core\Models\Tag;
use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UpdateTrainingAction
{
    /**
     * Executes the update of a training.
     *
     * @param Training $training
     * @param array $data
     * @param mixed $imageFile
     * @return Training
     */
    public function execute(Training $training, array $data, $imageFile = null): Training
    {
        // If title changed, update slug
        if ($data['title'] !== $training->title) {
            $slug = Str::slug($data['title']);
            $originalSlug = $slug;
            $count = 1;
            while (Training::where('slug', $slug)->where('id', '!=', $training->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $training->slug = $slug;
        }

        $imagePath = $training->cover_image;
        if ($imageFile) {
            // Delete old image if exists
            if ($training->cover_image && str_starts_with($training->cover_image, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $training->cover_image);
                Storage::disk('public')->delete($oldPath);
            }
            $imagePath = WebpConverter::convertAndStore($imageFile, 'trainings');
            $training->cover_image = $imagePath;
            $training->og_image = $imagePath;
        }

        $training->update([
            'title' => $data['title'],
            'excerpt' => $data['excerpt'] ?? null,
            'description' => $data['description'],
            'institution' => $data['institution'],
            'instructor' => $data['instructor'] ?? null,
            'duration' => $data['duration'],
            'price' => $data['price'] ?? null,
            'location' => $data['location'] ?? null,
            'mode' => $data['mode'] ?? 'online',
            'registration_link' => $data['registration_link'] ?? null,
            'start_date' => isset($data['start_date']) ? Carbon::parse($data['start_date']) : null,
            'end_date' => isset($data['end_date']) ? Carbon::parse($data['end_date']) : null,
            'featured' => isset($data['featured']) ? (bool)$data['featured'] : false,
            'status' => $data['status'] ?? $training->status,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
        ]);

        // Sync Categories
        if (isset($data['categories']) && is_array($data['categories'])) {
            $training->categories()->sync($data['categories']);
        } else {
            $training->categories()->detach();
        }

        // Sync Tags
        if (isset($data['tags'])) {
            $tagsArray = is_array($data['tags']) ? $data['tags'] : explode(',', $data['tags']);
            $tagIds = [];
            foreach ($tagsArray as $tagName) {
                $tagName = trim($tagName);
                if ($tagName === '') continue;
                $tag = Tag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $training->tags()->sync($tagIds);
        } else {
            $training->tags()->detach();
        }

        // Clean cache
        Cache::flush();

        return $training;
    }
}
