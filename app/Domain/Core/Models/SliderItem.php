<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    protected $fillable = ['title', 'subtitle', 'image_path', 'url', 'badge', 'badge_color', 'order'];
}
