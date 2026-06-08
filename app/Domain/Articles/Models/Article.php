<?php

namespace App\Domain\Articles\Models;

use App\Domain\Categories\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'body',
        'image_path',
        'author_id',
        'category_id',
        'reading_time',
        'status',
        'published_at',
        'featured',
        'views_count',
        'meta_title',
        'meta_description',
        'og_image',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured' => 'boolean',
        'views_count' => 'integer',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(Comment::class)->where('is_approved', true);
    }

    /**
     * Get all of the tags for the article.
     */
    public function tags(): \Illuminate\Database\Eloquent\Relations\MorphToMany
    {
        return $this->morphToMany(\App\Domain\Core\Models\Tag::class, 'taggable');
    }

    /**
     * Query scope to filter only articles that are published or scheduled for a past/current date.
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
