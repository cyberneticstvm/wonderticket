<?php

namespace App\Http\Controllers;

use App\Models\PlayCategory;
use App\Models\PrizeSetting;
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

    public function plays(){
        return view('admin.play.index');
    }

    public function createPlay(){
        return view('admin.play.create');
    }

    public function savePlay(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        PlayCategory::create($input);
        return redirect()->route('plays')->with('success', 'Play Created Successfully!');
    }

    public function editPlay($id){
        $play = PlayCategory::findOrFail(decrypt($id));
        return view('admin.play.edit', compact('play'));
    }

    public function updatePlay(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'status' => 'required',
        ]);
        $input = $request->all();
        $play = PlayCategory::findOrFail($id);
        $play->update($input);
        return redirect()->route('plays')->with('success', 'Play Updated Successfully!');
    }

    public function deletePlay($id){
        PlayCategory::findOrFail($id)->delete();
        return redirect()->route('plays')->with('success', 'Play Deleted Successfully!');
    }

    public function prizes(){
        return view('admin.prize.index');
    }

    public function createPrize(){
        return view('admin.prize.create');
    }

    public function savePrize(Request $request){
        $this->validate($request, [
            'position' => 'required',
            'prize_count' => 'required',
            'amount' => 'required',
            'super' => 'required',
            'status' => 'required',
        ]);
        PrizeSetting::insert([
            'position' => $request->position,
            'prize_count' => $request->prize_count,
            'amount' => $request->amount,
            'super' => $request->super,
            'status' => $request->status,
        ]);
        return redirect()->route('prizes')->with('success', 'Prize Created Successfully!');
    }

    public function editPrize($id){
        $prize = PrizeSetting::findOrFail(decrypt($id));
        return view('admin.prize.edit', compact('prize'));
    }

    public function updatePrize(Request $request, $id){
        $this->validate($request, [
            'position' => 'required',
            'prize_count' => 'required',
            'amount' => 'required',
            'super' => 'required',
            'status' => 'required',
        ]);
        PrizeSetting::where('id', $id)->update([
            'position' => $request->position,
            'prize_count' => $request->prize_count,
            'amount' => $request->amount,
            'super' => $request->super,
            'status' => $request->status,
        ]);
        return redirect()->route('prizes')->with('success', 'Prize Updated Successfully!');
    }

    public function deletePrize($id){
        PrizeSetting::findOrFail($id)->delete();
        return redirect()->route('prizes')->with('success', 'Prize Deleted Successfully!');
    }

    public function logout(){
        Session::flush();
        Auth::logout();        
        return redirect()->route('admin.login')
            ->withSuccess('User logged out successfully!');;
    }
}
