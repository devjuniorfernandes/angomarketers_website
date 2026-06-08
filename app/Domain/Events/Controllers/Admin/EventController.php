<?php

namespace App\Domain\Events\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Domain\Events\Models\Event;
use App\Domain\Events\Models\EventPhoto;
use App\Domain\Events\Actions\CreateEventAction;
use App\Domain\Events\Actions\UpdateEventAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class EventController extends Controller
{
    /**
     * Display a listing of all events.
     */
    public function index()
    {
        $events = Event::latest('event_date')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     */
    public function create()
    {
        return view('admin.events.form');
    }

    /**
     * Store a newly created event in storage.
     */
    public function store(Request $request, CreateEventAction $action)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'body' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'registration_link' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'image' => 'required|image|max:4096', // Max 4MB
            'gallery.*' => 'nullable|image|max:4096',
            'featured' => 'nullable|boolean',
            'organizer' => 'nullable|string|max:255',
            'event_end_date' => 'nullable|date|after_or_equal:event_date',
            'ticket_price' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags' => 'nullable|string',
        ]);

        $gallery = $request->file('gallery') ?? [];

        $action->execute($request->all(), $request->file('image'), $gallery);

        return redirect()->route('admin.events.index')->with('success', 'Evento criado com sucesso!');
    }

    /**
     * Show the form for editing the specified event.
     */
    public function edit(Event $event)
    {
        $event->load('photos');
        $tags = $event->tags->pluck('name')->implode(', ');
        return view('admin.events.form', compact('event', 'tags'));
    }

    /**
     * Update the specified event in storage.
     */
    public function update(Request $request, Event $event, UpdateEventAction $action)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'body' => 'required|string',
            'event_date' => 'required|date',
            'location' => 'required|string|max:255',
            'registration_link' => 'nullable|url|max:255',
            'video_url' => 'nullable|url|max:255',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:4096', // Max 4MB
            'gallery.*' => 'nullable|image|max:4096',
            'delete_photos' => 'nullable|array',
            'delete_photos.*' => 'exists:event_photos,id',
            'featured' => 'nullable|boolean',
            'organizer' => 'nullable|string|max:255',
            'event_end_date' => 'nullable|date|after_or_equal:event_date',
            'ticket_price' => 'nullable|numeric|min:0',
            'capacity' => 'nullable|integer|min:0',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'tags' => 'nullable|string',
        ]);

        $gallery = $request->file('gallery') ?? [];
        $deletePhotos = $request->input('delete_photos') ?? [];

        $action->execute($event, $request->all(), $request->file('image'), $gallery, $deletePhotos);

        return redirect()->route('admin.events.index')->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Remove the specified event from storage.
     */
    public function destroy(Event $event)
    {
        // Delete banner
        if ($event->image_path && str_starts_with($event->image_path, '/storage/')) {
            $bannerPath = str_replace('/storage/', '', $event->image_path);
            Storage::disk('public')->delete($bannerPath);
        }

        // Delete gallery photos files and database records
        $event->load('photos');
        foreach ($event->photos as $photo) {
            if (str_starts_with($photo->image_path, '/storage/')) {
                $pPath = str_replace('/storage/', '', $photo->image_path);
                Storage::disk('public')->delete($pPath);
            }
        }

        $event->delete();

        // Clear web cache
        Cache::flush();

        return redirect()->route('admin.events.index')->with('success', 'Evento eliminado com sucesso!');
    }
}
