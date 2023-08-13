<?php

use App\Models\PlayCategory;
use App\Models\PrizeSetting;

function prizes(){
    return PrizeSetting::all();
}

function plays(){
    return PlayCategory::all();
}

?>