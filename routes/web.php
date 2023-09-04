<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', [UserController::class, 'signin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('user.login');

Route::get('/admin', function () {
    return view('admin.login');
});

Route::post('/admin', [AdminController::class, 'login'])->name('admin.login');

Route::middleware(['web', 'auth', 'admin'])->prefix('admin')->controller(AdminController::class)->group(function(){
    Route::get('dash', 'index')->name('admin.dash');

    Route::get('users', 'users')->name('users');    
    Route::get('user/create', 'createUser')->name('user.create');
    Route::post('user/create', 'saveUser')->name('user.save');
    Route::get('user/edit/{id}', 'editUser')->name('user.edit');
    Route::put('user/edit/{id}', 'updateUser')->name('user.update');
    Route::delete('user/delete/{id}', 'deleteUser')->name('user.delete');

    Route::get('plays', 'plays')->name('plays');    
    Route::get('play/create', 'createPlay')->name('play.create');
    Route::post('play/create', 'savePlay')->name('play.save');
    Route::get('play/edit/{id}', 'editPlay')->name('play.edit');
    Route::put('play/edit/{id}', 'updatePlay')->name('play.update');
    Route::delete('play/delete/{id}', 'deletePlay')->name('play.delete');

    Route::get('prizes', 'prizes')->name('prizes');    
    Route::get('prize/create', 'createPrize')->name('prize.create');
    Route::post('prize/create', 'savePrize')->name('prize.save');
    Route::get('prize/edit/{id}', 'editPrize')->name('prize.edit');
    Route::put('prize/edit/{id}', 'updatePrize')->name('prize.update');
    Route::delete('prize/delete/{id}', 'deletePrize')->name('prize.delete');

    Route::get('winner/create', 'createWinner')->name('winner.create');
    Route::post('winner/create', 'saveWinner')->name('winner.save');
    Route::delete('winner/delete/{id}', 'deleteWinner')->name('winner.delete');

    Route::get('logout', 'logout')->name('admin.logout');
});

Route::middleware(['web', 'auth', 'user'])->prefix('user')->controller(UserController::class)->group(function(){
    Route::get('message', 'message')->name('message');
    Route::get('dash', 'index')->name('user.dash');
    Route::get('profile', 'profile')->name('user.profile');
    Route::get('reports', 'reports')->name('user.reports');
    Route::post('reports', 'getReports')->name('user.reports.fetch');
    Route::get('buy', 'buyNumbers')->name('user.buy.numbers');
    Route::post('buy', 'saveNumbers')->name('user.save.numbers')->middleware('checkplay');
    Route::get('misc', 'misc')->name('user.misc');
    Route::get('number/delete/{id}', 'deleteNumber')->name('user.delete.number');
    Route::get('logout', 'logout')->name('user.logout');
});

Route::middleware(['web', 'auth', 'leader'])->prefix('leader')->controller(LeaderController::class)->group(function(){
    Route::get('message', 'message')->name('message');
    Route::get('dash', 'index')->name('leader.dash');
    Route::get('profile', 'profile')->name('leader.profile');
    Route::get('user/create', 'createUser')->name('leader.user.create');
    Route::post('user/create', 'saveUser')->name('leader.user.save');
    Route::get('user/edit/{id}', 'editUser')->name('leader.user.edit');
    Route::put('user/edit/{id}', 'updateUser')->name('leader.user.update');
    Route::get('user/delete/{id}', 'deleteUser')->name('leader.user.delete');
    Route::get('misc', 'misc')->name('leader.misc');
    Route::get('reports', 'reports')->name('leader.reports');
    Route::post('reports', 'getReports')->name('leader.reports.fetch');

    Route::get('logout', 'logout')->name('leader.logout');
});
