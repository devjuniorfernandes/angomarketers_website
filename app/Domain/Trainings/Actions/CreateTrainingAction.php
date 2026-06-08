<?php

namespace App\Domain\Trainings\Actions;

use App\Domain\Trainings\Models\Training;
use App\Domain\Core\Models\Tag;
use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class CreateTrainingAction
{
    /**
     * Executes the creation of a training.
     *
     * @param array $data
     * @param mixed $imageFile
     * @return Training
     */
    public function execute(array $data, $imageFile): Training
    {
        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Training::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = '';
        if ($imageFile) {
            $imagePath = WebpConverter::convertAndStore($imageFile, 'trainings');
        }

        $status = $data['status'] ?? 'published';

        $training = Training::create([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'] ?? null,
            'description' => $data['description'],
            'cover_image' => $imagePath,
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
            'status' => $status,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'og_image' => $imagePath, // Default to cover image
        ]);

        // Sync Categories
        if (isset($data['categories']) && is_array($data['categories'])) {
            $training->categories()->sync($data['categories']);
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
        }

        // Clean cache
        Cache::flush();

        return $training;
    }
}
