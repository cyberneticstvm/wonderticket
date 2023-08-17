<?php

namespace App\Http\Middleware;

use App\Models\PlayCategory;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Checkplay
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $from_time = PlayCategory::where('id', $request->play_category)->first()->entry_locked_from; 
        $to_time = PlayCategory::where('id', $request->play_category)->first()->entry_locked_to;
        if(!Carbon::now()->between($from_time, $to_time)):
            return $next($request);
        endif;
        return redirect()->route('message')->with("error", "Oops! you are not allowed to order at this time.");
    }
}
