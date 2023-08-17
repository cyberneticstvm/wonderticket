<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Play extends Model
{
    use HasFactory;

    protected $fillable = [
        'play_category',
        'option',
        'user_id',
    ];

    protected $casts = ['created_at' => 'datetime'];

    public function play(){
        return $this->belongsTo(PlayCategory::class, 'play_category', 'id');
    }

    public function numbers(){
        return $this->hasMany(Number::class, 'play_id', 'id');
    }
}
