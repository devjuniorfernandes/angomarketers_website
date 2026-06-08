<?php

namespace App\Domain\Core\Models;

use Illuminate\Database\Eloquent\Model;

class SearchLog extends Model
{
    protected $fillable = ['query', 'hits'];
}
