<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Play;
use App\Models\PlayCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('username', 'password', 'status', 'type');
        if(Auth::attempt($credentials)):
            $user = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($user);
            return redirect()->route('user.dash')
                ->withSuccess('User successfully logged in!');
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
        return view('reports');
    }

    public function buyNumbers(){
        return view('buy');
    }

    public function saveNumbers(Request $request){
        $this->validate($request, [
            'play_category' => 'required',
            'numbers' => 'present|array',
            'counts' => 'present|array',
        ]);
        $input = $request->all();
        $input['user_id'] = $request->user()->id;
        try{
            DB::transaction(function() use ($request, $input){                
                $play = Play::create($input);
                foreach($request->numbers as $key => $value):
                    $nums [] = [
                        'play_id' => $play->id,
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

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('user.login')
            ->withSuccess('User logged out successfully!');;
    }
}
