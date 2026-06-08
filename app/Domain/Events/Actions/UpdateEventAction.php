<?php

namespace App\Domain\Events\Actions;

use App\Domain\Events\Models\Event;
use App\Domain\Events\Models\EventPhoto;
use App\Domain\Core\Helpers\WebpConverter;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UpdateEventAction
{
    /**
     * Executes the update of an event.
     *
     * @param Event $event
     * @param array $data
     * @param mixed $imageFile
     * @param array $galleryFiles
     * @param array $deletePhotos
     * @return Event
     */
    public function execute(Event $event, array $data, $imageFile = null, array $galleryFiles = [], array $deletePhotos = []): Event
    {
        // If title changed, update slug
        if ($data['title'] !== $event->title) {
            $slug = Str::slug($data['title']);
            $originalSlug = $slug;
            $count = 1;
            while (Event::where('slug', $slug)->where('id', '!=', $event->id)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }
            $event->slug = $slug;
        }

        if ($imageFile) {
            // Delete old banner if stored locally
            if ($event->image_path && str_starts_with($event->image_path, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $event->image_path);
                Storage::disk('public')->delete($oldPath);
            }
            $event->image_path = WebpConverter::convertAndStore($imageFile, 'events');
        }

        $status = $data['status'] ?? $event->status;
        if ($status === 'published' && $event->status !== 'published') {
            $event->published_at = now();
        } elseif ($status === 'scheduled') {
            $event->published_at = isset($data['published_at']) ? Carbon::parse($data['published_at']) : ($event->published_at ?? now());
        } elseif ($status === 'draft') {
            $event->published_at = null;
        }

        $event->update([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'body' => $data['body'],
            'event_date' => Carbon::parse($data['event_date']),
            'location' => $data['location'],
            'registration_link' => $data['registration_link'] ?? null,
            'video_url' => $data['video_url'] ?? null,
            'status' => $status,
            'featured' => isset($data['featured']) ? (bool)$data['featured'] : false,
            'organizer' => $data['organizer'] ?? null,
            'event_end_date' => isset($data['event_end_date']) ? Carbon::parse($data['event_end_date']) : null,
            'ticket_price' => $data['ticket_price'] ?? null,
            'capacity' => $data['capacity'] ?? null,
            'meta_title' => $data['meta_title'] ?? null,
            'meta_description' => $data['meta_description'] ?? null,
            'og_image' => $event->image_path,
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
        } else {
            $event->tags()->detach();
        }

        // Process gallery photos to delete
        if (!empty($deletePhotos)) {
            foreach ($deletePhotos as $photoId) {
                $photo = EventPhoto::find($photoId);
                if ($photo && $photo->event_id === $event->id) {
                    if (str_starts_with($photo->image_path, '/storage/')) {
                        $pPath = str_replace('/storage/', '', $photo->image_path);
                        Storage::disk('public')->delete($pPath);
                    }
                    $photo->delete();
                }
            }
        }

        // Process new gallery files
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

        // Clear web cache
        Cache::flush();

        return $event;
    }
}
