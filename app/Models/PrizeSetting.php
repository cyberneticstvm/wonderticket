<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizeSetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function options(){
        return $this->belongsTo(Option::class, 'option_id', 'id');
    }
}
