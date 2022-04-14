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
    return redirect()->route('dashboard.index');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','getLogin')->name('get.login');
    Route::post('/login','login')->name('login');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware('check.admin')->prefix('dashboard')->namespace('Admin')->group(function(){

    Route::get('/', 'MainController@index')->name('dashboard.index');

    Route::controller(NewsController::class)->prefix('news')->group( function(){
        Route::get('/','getAll')->name('news.all');
        Route::get('/create','create')->name('news.create');
        Route::post('/store','store')->name('news.store');
        Route::get('/edit/{id}','edit')->name('news.edit');
        Route::post('/update/{id}', 'update')->name('news.update');
        Route::get('/delete/{id}', 'delete')->name('news.delete');
    });

});
