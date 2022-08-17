<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/signed',function (){return \Illuminate\Support\Facades\URL::signedRoute('test.route');});
Route::get('/signeds',function (){return redirect('https://arslane-test.whereby.com/7448c94e-d7b3-4b79-867e-5831641edc4a');})->middleware('signed')->name('test.route');

Route::controller(\App\Http\Controllers\Web\V1\Meeting\MeetingController::class)->group(function (){
    Route::get('/test','index');
});
