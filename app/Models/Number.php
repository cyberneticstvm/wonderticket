<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'play_id',
        'number',
        'number_count',
        'option_id',
    ];
}
