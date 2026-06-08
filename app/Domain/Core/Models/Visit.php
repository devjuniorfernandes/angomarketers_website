<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public $timestamps = false;

    protected $fillable = ['ip_address', 'user_agent', 'url', 'visited_at'];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
