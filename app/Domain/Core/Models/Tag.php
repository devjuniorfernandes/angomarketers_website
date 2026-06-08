<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Get all of the articles that are assigned this tag.
     */
    public function articles(): MorphToMany
    {
        return $this->morphedByMany(\App\Domain\Articles\Models\Article::class, 'taggable');
    }

    /**
     * Get all of the events that are assigned this tag.
     */
    public function events(): MorphToMany
    {
        return $this->morphedByMany(\App\Domain\Events\Models\Event::class, 'taggable');
    }

    /**
     * Get all of the trainings that are assigned this tag.
     */
    public function trainings(): MorphToMany
    {
        return $this->morphedByMany(\App\Domain\Trainings\Models\Training::class, 'taggable');
    }
}
