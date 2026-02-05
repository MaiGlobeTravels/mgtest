<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tours extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'date',
    ];
}
