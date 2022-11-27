<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'index'])->middleware('auth.check')->name('index');
Route::prefix('users')->controller(LoginController::class)->group(function(){
    Route::get('login','index')->name('login.page');
    Route::post('login','login')->name('login.post');
    Route::post('logout','logout')->name('logout');
});
