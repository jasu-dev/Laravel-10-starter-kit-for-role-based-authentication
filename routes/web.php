<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ChanegPasswordController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\User\UserHomeController;

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
//public routes for all users
Route::get('/', function () {
    return view('welcome');
});

//Auth routes for login and password change or reset.
Route::group(['prefix' => 'auth'], function () {
    Auth::routes();
    Route::post('/change-password', [ChanegPasswordController::class, 'changePassword'])->name('change-password');
});


//all routes for user role
Route::group(['middleware' => ['auth', 'role:user']], function () {
    Route::get('/home', [UserHomeController::class, 'index'])->name('home');
});

//all routes for admin role
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:admin'],
    'as' => 'admin.'
], function () {
    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('home');
});
