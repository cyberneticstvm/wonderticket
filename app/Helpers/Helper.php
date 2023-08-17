<?php

use App\Models\User;
use App\Models\PlayCategory;
use App\Models\PrizeSetting;
use App\Models\Winner;
use Carbon\Carbon;

function prizes(){
    return PrizeSetting::orderByDesc('status')->get();
}

function plays(){
    return PlayCategory::orderByDesc('status')->get();
}

function dashboardData(){
    $new_users_count = User::whereMonth('created_at', Carbon::today())->whereYear('created_at', Carbon::today())->count();
    $data = collect([
        (object) ['new_users_count' => $new_users_count,]
    ]);
    return $data;
}

function winner($play_id){
    return Winner::where('play_id', $play_id)->whereDate('date', Carbon::today())->first();
}
?>