<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Play;
use App\Models\PlayCategory;
use App\Models\Winner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function signin(){
        if(Auth::check() && Auth::user()->type == 'leader'):
            return redirect('/leader/dash');
        elseif(Auth::check() &&  Auth::user()->type == 'user'):
            return redirect('/user/dash');
        else:
            return view('login');
        endif;        
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password', 'status');
        if(Auth::attempt($credentials)):
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            if($user->type == 'user'):
                return redirect()->route('user.dash')->withSuccess('User successfully logged in!');
            else:
                return redirect()->route('leader.dash')->withSuccess('User successfully logged in!');
            endif;
        endif;
        return back()->with('error', 'Login details are not valid')->withInput($request->all());
    }

    public function index(){
        return view('dash');
    }

    public function profile(){
        return view('profile');
    }

    public function reports(){
        $inputs = []; $data = collect();
        return view('reports', compact('inputs', 'data'));
    }

    public function getReports(Request $request){
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'type' => 'required',
        ]);
        $inputs = array($request->from_date, $request->to_date, $request->play, $request->type);
        if($request->type == 1):
            $data = Play::where('user_id', $request->user()->id)->when($request->play > 0, function($q) use ($request) {
                return $q->where('play_category', $request->play);
            })->whereBetween('created_at', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->orderByDesc('created_at')->get();
        elseif($request->type == 2):
            $data = Play::where('user_id', $request->user()->id)->whereBetween('created_at', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->play > 0, function($q) use ($request) {
                return $q->where('play_category', $request->play);
            })->orderByDesc('created_at')->get();
        else:
            $data = Number::leftJoin('plays', 'numbers.play_id', 'plays.id')->whereBetween('created_at', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->play > 0, function($q) use ($request) {
                return $q->where('plays.play_category', $request->play);
            })->latest()->get();
        endif;
        return view('reports', compact('inputs', 'data'));
    }

    public function buyNumbers(){
        return view('buy');
    }

    public function saveNumbers(Request $request){
        $this->validate($request, [
            'play_category' => 'required',
            'numbers' => 'present|array',
            'counts' => 'present|array',
            'selected_option' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        try{
            DB::transaction(function() use ($request, $input){                
                $play = Play::create($input);
                foreach($request->numbers as $key => $value):
                    $nums [] = [
                        'play_id' => $play->id,
                        'option_id' => $request->selected_option,
                        'number' => $value,
                        'number_count' => $request->counts[$key],
                    ];
                endforeach;
                Number::insert($nums);
            });
        }catch(Exception $e){
            return back()->with('error', $e->getMessage())->withInput($request->all());
        }
        return redirect()->route('user.buy.numbers')->withSuccess('Numbers purchased successfully.');
    }

    public function misc(){
        $plays = Play::where('user_id', Auth::user()->id)->whereDate('created_at', Carbon::today())->get();
        return view('misc', compact('plays'));
    }

    public function message(){
        return view('errors.401');
    }

    function deleteNumber($id){
        $play = Number::findOrFail($id)->play->play;
        $time = Carbon::now()->format("H:i:s");
        $chk = PlayCategory::where('id', $play->id)->where('entry_locked_from', '>', $time)->first();
        if($chk):
            Number::findOrFail($id)->delete();
            return redirect()->back()->withSuccess('Number deleted successfully.');
        else:
            return redirect()->back()->withError('Failed to delete.');
        endif;
    }

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('user.login')
            ->withSuccess('User logged out successfully!');;
    }
}
