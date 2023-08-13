<?php

use App\Http\Controllers\AdminController;
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
    return view('login');
});

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
    Route::PUT('user/edit/{id}', 'updateUser')->name('user.update');
    Route::DELETE('user/delete/{id}', 'deleteUser')->name('user.delete');

    Route::get('winner/create', 'createWinner')->name('winner.create');
    Route::post('winner/create', 'saveWinner')->name('winner.save');

    Route::get('logout', 'logout')->name('admin.logout');
});

Route::middleware(['web', 'auth', 'user'])->prefix('user')->controller(UserController::class)->group(function(){
    Route::get('dash', 'index')->name('user.dash');
    Route::get('logout', 'logout')->name('user.logout');
});
