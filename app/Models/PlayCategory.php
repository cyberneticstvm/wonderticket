<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'entry_locked_from',
        'entry_locked_to',
        'status',
    ];

    protected $casts = ['entry_locked_from' => 'datetime', 'entry_locked_to' => 'datetime'];
}
