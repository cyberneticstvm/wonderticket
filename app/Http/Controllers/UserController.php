<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function misc(){
        return view('dash');
    }

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('user.login')
            ->withSuccess('User logged out successfully!');;
    }
}
