<?php

namespace App\Domain\Events\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventPhoto extends Model
{
    protected $fillable = [
        'event_id',
        'image_path',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
