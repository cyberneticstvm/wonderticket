<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
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
            return redirect()->route('admin.dash')
                ->withSuccess('User successfully logged in!');
        endif;
        return back()->with('error', 'Login details are not valid')->withInput($request->all());
    }

    public function index(){
        return view('admin.dash');
    }

    public function users(){
        $users = User::where('id', '<>', 1)->get();
        return view('admin.user.index', compact('users'));
    }

    public function createUser(){
        return view('admin.user.create');
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
        User::create($input);
        return redirect()->route('users')->with('success', 'User Created Successfully!');
    }

    public function editUser($id){
        $user = User::find(decrypt($id));
        return view('admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email:rfc',
            'phone' => 'required|numeric|digits:10',
            'type' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $user = User::findOrFail($id);
        $input['password'] = ($request->password) ? Hash::make($request->password) : $user->getOriginal('password');
        $user->update($input);
        return redirect()->route('users')->with('success', 'User Updated Successfully!');
    }

    public function deleteUser($id){
        User::findOrFail($id)->delete();
        return redirect()->route('users')->with('success', 'User Deleted Successfully!');
    }

    public function createWinner(){
        return view('admin.winner.index');
    }

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('admin.login')
            ->withSuccess('User logged out successfully!');;
    }
}
