<?php

namespace App\Domain\Events\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'image_path',
        'event_date',
        'location',
        'registration_link',
        'video_url',
        'status',
        'published_at',
        'featured',
        'views_count',
        'organizer',
        'event_end_date',
        'ticket_price',
        'capacity',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'published_at' => 'datetime',
        'event_end_date' => 'datetime',
        'featured' => 'boolean',
        'views_count' => 'integer',
        'ticket_price' => 'decimal:2',
        'capacity' => 'integer',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(EventPhoto::class);
    }

    /**
     * Get all of the tags for the event.
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(\App\Domain\Core\Models\Tag::class, 'taggable');
    }

    /**
     * Determines if the event date has passed compared to now.
     */
    public function isPast(): bool
    {
        return $this->event_date->isPast();
    }

    /**
     * Query scope to filter only events that are published or scheduled for a past/current date.
     */
    public function scopePublished($query)
    {
        return $query->where(function ($q) {
            $q->where('status', 'published')
              ->orWhere(function ($sq) {
                  $sq->where('status', 'scheduled')
                     ->where('published_at', '<=', now());
              });
        });
    }
}
