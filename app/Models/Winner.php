<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['date' => 'date'];

    public function play(){
        return $this->belongsTo(PlayCategory::class, 'play_id', 'id');
    }

    public function positions(){
        return $this->hasMany(WinnerDetails::class, 'winner_id', 'id');
    }

    public function positions1(){
        return $this->hasMany(WinnerDetails::class, 'winner_id', 'id')->where('position', '>', 5)->orderBy('value', 'ASC');
    }
}
