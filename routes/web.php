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
Route::controller(UserController::class)->prefix('mypage')->group(function(){
    Route::get('/mypage','index')->name('mypage.index');
    Route::get('/changeImg','change')->name('mypage.change')->middleware('auth');
    Route::post('changeImg','upload')->name('mypage.upload')->middleware('auth');
    Route::get('/deleteImg','delete')->name('mypage.delete')->middleware('auth');
    Route::post('/deleteImg','delete')->name('mypage.delete')->middleware('auth');
});

use App\Http\Controllers\PhotoController;
Route::controller(PhotoController::class)->prefix('island')->group(function(){
    Route::get('photo/detail','index')->name('photos.index');
    Route::get('photo/create','add')->name('photo.add')->middleware('auth');
    Route::post('photo/create','create')->name('photo.create')->middleware('auth');
    Route::get('photo/show','show')->name('photo.show');
    Route::get('mypage/detail','detail')->name('mypage.detail');
    Route::post('photo/detail','comment')->name('photo.comment');
    Route::get('photo/delete', 'delete')->name('photo.delete');
    Route::post('photo/delete','delete')->name('photo.delete');
    Route::get('photo/search','showSearch')->name('photo.showSearch');
    Route::post('photo/search','search')->name('photo.search');

});

use App\Http\Controllers\LikeController;
Route::controller(LikeController::class)->prefix('island')->group(function(){
    Route::post('like/{photo_id}','store')->name('like.store');
    Route::post('unlike/{photo_id}','destroy')->name('like.destroy');
});

Auth::routes();

use App\Http\Controllers\Auth\LoginController;
Route::controller(LoginController::class)->group(function(){
    Route::post('/logout','logout')->name('logout');
});


