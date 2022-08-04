<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});

Route::group(['prefix'=>'user'],function(){

    Route::get('/create', [UserController::class, 'addUser'])->name('create');
    Route::get('/checkuser', [UserController::class, 'checkUser'])->name('checkUser');
    Route::group(['middleware'=>'CheckUser'],function(){
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/login', function(){return view('user.login');})->name('login');
        Route::get('/register', function(){return view('user.register');})->name('register');
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::get('/settings', [UserController::class, 'settings'])->name('user.settings');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    });
});


Route::group(['prefix'=>'admin'],function(){

    Route::post('/save',[AdminController::class, 'addAdmin'])->name('save');
    Route::post('/check',[AdminController::class, 'check'])->name('check');
    Route::group(['middleware'=>'CheckAdmin'],function(){

        Route::get('/register',function(){return view('admin.register');})->name('admin.register');
        Route::get('/login',function(){return view('admin.login');})->name('admin.login');
        Route::get('/logout',[AdminController::class, 'logout'])->name('logout');
        Route::get('/dashboard',[AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/settings',[AdminController::class, 'settings'])->name('settings');
        Route::get('/profile',[AdminController::class, 'profile'])->name('profile');
        Route::get('/staff' ,[AdminController::class, 'staff'])->name('staff');
    
    });
});




// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');