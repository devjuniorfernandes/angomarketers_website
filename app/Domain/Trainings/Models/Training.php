<?php

namespace App\Domain\Trainings\Models;

use App\Domain\Core\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Training extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'description',
        'cover_image',
        'institution',
        'instructor',
        'duration',
        'price',
        'location',
        'mode', // online, presencial, híbrido
        'registration_link',
        'start_date',
        'end_date',
        'featured',
        'status', // draft, published, scheduled
        'views_count',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'views_count' => 'integer',
    ];

    /**
     * The categories that belong to the training.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(TrainingCategory::class, 'training_category', 'training_id', 'category_id');
    }

    /**
     * Get all of the tags for the training.
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Query scope to filter only published trainings.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Query scope to filter featured trainings.
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
