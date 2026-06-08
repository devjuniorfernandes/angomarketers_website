<?php

namespace App\Domain\Events\Actions;

use App\Domain\Events\Models\Event;
use App\Domain\Events\Models\EventPhoto;
use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class CreateEventAction
{
    /**
     * Executes the creation of an event.
     *
     * @param array $data
     * @param mixed $imageFile
     * @param array $galleryFiles
     * @return Event
     */
    public function execute(array $data, $imageFile, array $galleryFiles = []): Event
    {
        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Event::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $imagePath = '';
        if ($imageFile) {
            $imagePath = WebpConverter::convertAndStore($imageFile, 'events');
        }

        $status = $data['status'] ?? 'published';
        $publishedAt = null;
        if ($status === 'published') {
            $publishedAt = now();
        } elseif ($status === 'scheduled') {
            $publishedAt = isset($data['published_at']) ? Carbon::parse($data['published_at']) : now();
        }

        $event = Event::create([
            'title' => $data['title'],
            'slug' => $slug,
            'description' => $data['description'] ?? null,
            'body' => $data['body'],
            'image_path' => $imagePath,
            'event_date' => Carbon::parse($data['event_date']),
            'location' => $data['location'],
            'registration_link' => $data['registration_link'] ?? null,
            'video_url' => $data['video_url'] ?? null,
            'status' => $status,
            'published_at' => $publishedAt,
            'featured' => isset($data['featured']) ? (bool)$data['featured'] : false,
            'organizer' => $data['organizer'] ?? null,
            'event_end_date' => isset($data['event_end_date']) ? Carbon::parse($data['event_end_date']) : null,
            'ticket_price' => $data['ticket_price'] ?? null,
            'capacity' => $data['capacity'] ?? null,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'og_image' => $imagePath,
        ]);

        if (isset($data['tags'])) {
            $tagsArray = is_array($data['tags']) ? $data['tags'] : explode(',', $data['tags']);
            $tagIds = [];
            foreach ($tagsArray as $tagName) {
                $tagName = trim($tagName);
                if ($tagName === '') continue;
                $tag = \App\Domain\Core\Models\Tag::firstOrCreate(
                    ['slug' => Str::slug($tagName)],
                    ['name' => $tagName]
                );
                $tagIds[] = $tag->id;
            }
            $event->tags()->sync($tagIds);
        }

        // Process Gallery Files
        if (!empty($galleryFiles)) {
            foreach ($galleryFiles as $file) {
                if ($file) {
                    $galleryPath = WebpConverter::convertAndStore($file, 'events/gallery');
                    EventPhoto::create([
                        'event_id' => $event->id,
                        'image_path' => $galleryPath,
                    ]);
                }
            }
        }

        // Clean cache
        Cache::flush();

        return $event;
    }
}
