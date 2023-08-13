<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Winner;
use App\Models\WinnerDetails;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $winners = Winner::whereDate('date', Carbon::today())->orderByDesc('date')->get();
        return view('admin.winner.index', compact('winners'));
    }

    public function saveWinner(Request $request){
        $this->validate($request, [
            'play_id' => 'required',
            'date' => 'required',
        ]);
        $input = $request->except(array('positions', 'position_values'));
        $input['created_by'] = $request->user()->id;
        $input['updated_by'] = $request->user()->id;
        try{
            DB::transaction(function() use ($input, $request) {
                $winner = Winner::create($input);
                foreach($request->positions as $key => $position):
                    $data[] = [
                        'winner_id' => $winner->id,
                        'position' => $position,
                        'value' => $request->position_values[$key]
                    ];
                endforeach;
                WinnerDetails::insert($data);
            });
        }catch(Exception $e){
            return redirect()->back()->with("error", "Data already updated!")->withInput($request->all());
        }
        return redirect()->back()->with("success", "Data updated successfully");
    }

    public function deleteWinner($id){
        Winner::findOrFail($id)->delete();
        return redirect()->route('winner.create')->with('success', 'Winner Deleted Successfully!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('admin.login')
            ->withSuccess('User logged out successfully!');;
    }
}
