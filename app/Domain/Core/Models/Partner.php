<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = ['name', 'logo_path', 'url', 'order'];
}
