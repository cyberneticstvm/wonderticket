<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
}
