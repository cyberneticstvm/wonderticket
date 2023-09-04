<?php

namespace App\Http\Controllers;

use App\Models\Number;
use App\Models\Play;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LeaderController extends Controller
{
    public function index(){
        return view('leader.dash');
    }

    public function message(){
        return view('errors.401');
    }

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('index')
            ->withSuccess('User logged out successfully!');
    }

    public function createUser(){
        $users = User::where('type', 'user')->where('leader_id', Auth::user()->id)->get();
        return view('leader.user.create', compact('users'));
    }

    public function saveUser(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'email' => 'required|email:rfc',
            'phone' => 'required|numeric|digits:10',
            'type' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $input['leader_id'] = $request->user()->id;
        User::create($input);
        return redirect()->back()->with('success', 'User Created Successfully!');
    }

    public function editUser($id){
        $user = User::find(decrypt($id));
        return view('leader.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email:rfc',
            'phone' => 'required|numeric|digits:10',
        ]);
        $input = $request->all();
        $user = User::findOrFail($id);
        $input['password'] = ($request->password) ? Hash::make($request->password) : $user->getOriginal('password');
        $user->update($input);
        return redirect()->route('leader.user.create')->with('success', 'User Updated Successfully!');
    }

    public function deleteUser($id){
        User::findOrFail(decrypt($id))->update(['status' => 0]);
        return redirect()->back()->with("success", "User cancelled successfully");
    }

    public function misc(){
        $plays = Play::whereIn('user_id', User::where('leader_id', Auth::user()->id)->pluck('id'))->whereDate('created_at', Carbon::today())->get();
        return view('leader.misc', compact('plays'));
    }

    public function profile(){
        return view('leader.profile');
    }

    public function reports(){
        $inputs = []; $data = collect(); $users = User::whereIn('id', User::where('leader_id', Auth::user()->id)->pluck('id'))->where('status', 1)->get();
        return view('leader.reports', compact('inputs', 'data', 'users'));
    }

    public function getReports(Request $request){
        $this->validate($request, [
            'from_date' => 'required',
            'to_date' => 'required',
            'type' => 'required',
        ]);
        $users = User::whereIn('id', User::where('leader_id', Auth::user()->id)->pluck('id'))->where('status', 1)->get();
        $inputs = array($request->from_date, $request->to_date, $request->play, $request->type, $request->user);
        if($request->type == 1):
            $data = Play::when($request->play > 0, function($q) use ($request) {
                return $q->where('play_category', $request->play);
            })->when($request->user > 0, function($q) use ($request) {
                return $q->whereIn('user_id', User::where('leader_id', Auth::user()->id)->pluck('id'));
            })->whereBetween('created_at', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->orderByDesc('created_at')->get();
        elseif($request->type == 2):
            $data = Winner::whereBetween('date', [$request->from_date, $request->to_date])->when($request->play > 0, function($q) use ($request) {
                return $q->where('play_id', $request->play);
            })->orderByDesc('date')->get();
        elseif($request->type == 3):
            $data = Number::leftJoin('plays', 'numbers.play_id', 'plays.id')->whereBetween('created_at', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->when($request->play > 0, function($q) use ($request) {
                return $q->where('plays.play_category', $request->play);
            })->when($request->user > 0, function($q) use ($request) {
                return $q->whereIn('user_id', User::where('leader_id', Auth::user()->id)->pluck('id'));
            })->latest()->get();
        else:
            $data = Play::when($request->play > 0, function($q) use ($request) {
                return $q->where('play_category', $request->play);
            })->when($request->user > 0, function($q) use ($request) {
                return $q->whereIn('user_id', User::where('leader_id', Auth::user()->id)->pluck('id'));
            })->whereBetween('created_at', [Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()])->orderByDesc('created_at')->get();
        endif;
        return view('leader.reports', compact('inputs', 'data', 'users'));
    }
}
