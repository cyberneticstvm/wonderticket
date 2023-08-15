<?php

use App\Models\PlayCategory;
use App\Models\PrizeSetting;

function prizes(){
    return PrizeSetting::orderByDesc('status')->get();
}

function plays(){
    return PlayCategory::orderByDesc('status')->get();
}

?>