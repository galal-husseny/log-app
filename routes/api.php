<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\FileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('file')->name('file.')->controller(FileController::class)->group(function(){
    Route::post('/begin','begin')->name('begin');
    Route::post('/next','next')->name('next');
    Route::post('/previous','previous')->name('previous');
    Route::post('/end','end')->name('end');
});

