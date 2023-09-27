<?php

use App\Models\Number;
use App\Models\Option;
use App\Models\Play;
use App\Models\User;
use App\Models\PlayCategory;
use App\Models\PrizeSetting;
use App\Models\Winner;
use App\Models\WinnerDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

function prizes(){
    return PrizeSetting::orderBy('id')->get();
}

function timediff(){
    $play = PlayCategory::findOrFail(1);
    $timediff = Carbon::parse($play->play_time)->diffInSeconds(Carbon::now());
    return array('diff' => $timediff, 'time' => $play->play_time);
}

function plays(){
    return PlayCategory::orderByDesc('status')->get();
}

function options(){
    return Option::all();
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

function getWinner($number_ids, $play_id, $date){
    $play = Play::findOrFail($play_id); $op = "";
    $numbers = Number::whereIn('id', $number_ids)->get();
    $winner = Winner::whereDate('created_at', $date)->where('play_id', $play->play_category)->first();
    foreach($numbers as $key => $num):
        if(in_array($num->number, $winner->positions()->pluck('value')->toArray())):
            $position = WinnerDetails::where('value', $num->number)->where('winner_id', $winner->id)->first();
            $prize = PrizeSetting::findOrFail($position->position);
            $op .= "Number: ".$num->number." | Count: ".$num->number_count." | Prize: ₹".number_format($prize->amount*$num->number_count, 2)."<br>";
        endif;
    endforeach;
    return $op;
}

function calculateCost($date, $play, $number, $count, $option){
    $cost = 0;
    switch($option):        
        case 1:
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->where('value', $number)->whereDate('created_at', $date)->where('play_id', $play)->first();             
            $prize = ($winner) ? PrizeSetting::findOrFail($winner->position) : NULL;
            //$count = ($winner && $winner->position == 6) ? 1 : $count; // Only 30 prizes for 6th position. So need to reset the count to be 1
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;
            break;
        case 2:           
            $cost = checkCombination($number, $date, $play, $count);           
            break;
        case 3:           
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', 'LIKE', $number.'%')->first();
            $prize = ($winner) ? PrizeSetting::where('option_id', $option)->where('position', 1)->first() : NULL;
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;        
            break;
        case 4:           
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', 'LIKE', '%'.$number)->first();
            $prize = ($winner) ? PrizeSetting::where('option_id', $option)->where('position', 1)->first() : NULL;
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;        
            break;
        case 5:
            $arr = array_map('intval', str_split($number));           
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', 'LIKE', $arr[0].'%'.$arr[1])->first();
            $prize = ($winner) ? PrizeSetting::where('option_id', $option)->where('position', 1)->first() : NULL;
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;        
            break;
        case 6:           
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', 'LIKE', $number.'%')->first();
            $prize = ($winner) ? PrizeSetting::where('option_id', $option)->where('position', 1)->first() : NULL;
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;        
            break;
        case 7:           
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', 'LIKE', '%'.$number.'%')->first();
            $prize = ($winner) ? PrizeSetting::where('option_id', $option)->where('position', 1)->first() : NULL;
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;        
            break;
        case 8:           
            $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', 'LIKE', $number.'%')->first();
            $prize = ($winner) ? PrizeSetting::where('option_id', $option)->where('position', 1)->first() : NULL;
            $cost = ($prize) ? $prize->prize_count*$prize->amount*$count : 0;        
            break;
    endswitch;
    return $cost;
}

function checkCombination($number, $date, $play, $count){
    $chk = false; $num = 0; $winner = [];
    $arr = array_map('intval', str_split($number));    
    for($i=0; $i<3; $i++):
        for($j=0; $j<3; $j++):
            for($k=0; $k<3; $k++):
                if($i!=$j && $j!=$k && $i!=$k):
                    $num = $arr[$i].$arr[$j].$arr[$k];
                    $winner = WinnerDetails::leftJoin('winners', 'winners.id', 'winner_details.winner_id')->whereDate('created_at', $date)->where('play_id', $play)->where('value', $num)->first();
                    $chk = ($winner) ? true : false;
                    if($chk) break;
                endif;
                if($chk) break;
            endfor;
            if($chk) break;
        endfor;
    endfor;
    $prize = ($chk) ? PrizeSetting::where('position', $winner->position)->where('option_id', 2)->first() : NULL;
    return ($chk) ? $prize->prize_count*$prize->amount*$count : 0;
}

?>