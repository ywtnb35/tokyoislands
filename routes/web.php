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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TopController;
Route::controller(TopController::class)->group(function(){
    Route::get('/top','index');
});

use App\Http\Controllers\IslandController;
Route::controller(IslandController::class)->group(function(){
    Route::get('/island/top','index')->name('island.top');
});

use App\Http\Controllers\UserController;
Route::controller(UserController::class)->group(function(){
    Route::get('mypage','index')->name('mypage');
    Route::get('mypagedetail/{id}','detail')->name('mypage.detail');
});

use App\Http\Controllers\PhotoController;
Route::controller(PhotoController::class)->prefix('island')->group(function(){
    Route::get('photo/detail','index')->name('photos.index');
    Route::get('photo/create','add')->name('photo.add')->middleware('auth');
    Route::post('photo/create','create')->name('photo.create')->middleware('auth');
    Route::get('photo/show','show')->name('photo.show');
    Route::get('photo/delete', 'delete')->name('photo.delete');
});


Auth::routes();


