<?php

namespace App\Domain\Articles\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'avatar_path',
        'role',
        'bio',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
