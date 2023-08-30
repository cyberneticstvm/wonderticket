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

    public function getOption(){
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }

    public function play(){
        return $this->belongsTo(Play::class, 'play_id', 'id');
    }

    protected $casts = ['created_at' => 'datetime'];
}
