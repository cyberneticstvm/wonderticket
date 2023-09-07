<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WinnerDetails extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function winner(){
        return $this->belongsTo(PrizeSetting::class, 'id', 'position');
    }
}
