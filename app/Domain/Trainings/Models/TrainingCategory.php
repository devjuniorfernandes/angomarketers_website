<?php

namespace App\Domain\Trainings\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TrainingCategory extends Model
{
    protected $table = 'training_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * The trainings that belong to the category.
     */
    public function trainings(): BelongsToMany
    {
        return $this->belongsToMany(Training::class, 'training_category', 'category_id', 'training_id');
    }
}
