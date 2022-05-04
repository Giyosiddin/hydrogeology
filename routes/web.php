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
    Route::post('ckeditor/image_upload', 'MainController@upload')->name('upload');

    Route::get('/', 'MainController@index')->name('dashboard.index');

    Route::controller(NewsController::class)->prefix('news')->group( function(){
        Route::get('/','getAll')->name('news.all');
        Route::get('/create','create')->name('news.create');
        Route::post('/store','store')->name('news.store');
        Route::get('/edit/{id}','edit')->name('news.edit');
        Route::post('/update/{id}', 'update')->name('news.update');
        Route::get('/delete/{id}', 'delete')->name('news.delete');
    });

    Route::controller(DecisionController::class)->prefix('decision')->group( function(){
        Route::get('/all','getAll')->name('decision.all');
        Route::get('/create','create')->name('decision.create');
        Route::post('/store','store')->name('decision.store');
        Route::get('/edit/{id}','edit')->name('decision.edit');
        Route::post('/update/{id}', 'update')->name('decision.update');
        Route::get('/delete/{id}', 'delete')->name('decision.delete');
    });

    Route::controller(StaffController::class)->prefix('staff')->group( function(){
        Route::get('/all','getAll')->name('staff.all');
        Route::get('/create','create')->name('staff.create');
        Route::post('/store','store')->name('staff.store');
        Route::get('/edit/{id}','edit')->name('staff.edit');
        Route::post('/update/{id}', 'update')->name('staff.update');
        Route::get('/delete/{id}', 'delete')->name('staff.delete');
    });

    Route::controller(PageController::class)->prefix('page')->group( function(){
        Route::get('/all','getAll')->name('page.all');
        Route::get('/create','create')->name('page.create');
        Route::post('/store','store')->name('page.store');
        Route::get('/edit/{id}','edit')->name('page.edit');
        Route::post('/update/{id}', 'update')->name('page.update');
        Route::get('/delete/{id}', 'delete')->name('page.delete');
    });

    Route::controller(VacancyController::class)->prefix('vacancy')->group( function(){
        Route::get('/all','getAll')->name('vacancy.all');
        Route::get('/create','create')->name('vacancy.create');
        Route::post('/store','store')->name('vacancy.store');
        Route::get('/edit/{id}','edit')->name('vacancy.edit');
        Route::post('/update/{id}', 'update')->name('vacancy.update');
        Route::get('/delete/{id}', 'delete')->name('vacancy.delete');
    });

    Route::controller(GallaryController::class)->prefix('gallary')->group( function(){
        Route::get('/all','getAll')->name('gallary.all');
        Route::get('/create','create')->name('gallary.create');
        Route::post('/store','store')->name('gallary.store');
        Route::get('/edit/{id}','edit')->name('gallary.edit');
        Route::post('/update/{id}', 'update')->name('gallary.update');
        Route::get('/delete/{id}', 'delete')->name('gallary.delete');
    });
    Route::controller(UsefulResourceController::class)->prefix('usefull-resources')->group( function(){
        Route::get('/all','getAll')->name('usefull.all');
        Route::get('/create','create')->name('usefull.create');
        Route::post('/store','store')->name('usefull.store');
        Route::get('/edit/{id}','edit')->name('usefull.edit');
        Route::post('/update/{id}', 'update')->name('usefull.update');
        Route::get('/delete/{id}', 'delete')->name('usefull.delete');
    });
    Route::controller(MenuController::class)->prefix('menus')->group( function(){
        Route::get('/all','getAll')->name('menu.all');
        Route::get('/create','create')->name('menu.create');
        Route::post('/store','store')->name('menu.store');
        Route::get('/edit/{id}','edit')->name('menu.edit');
        Route::post('/update/{id}', 'update')->name('menu.update');
        Route::get('/delete/{id}', 'delete')->name('menu.delete');

        /* Menu items routes  */
        Route::get('/{menu_id}/all-items','getAllItems')->name('menuItem.all');
        Route::get('/{menu_id}/create-item','createItem')->name('menuItem.create');
        Route::post('/{menu_id}/store-item','storeItem')->name('menuItem.store');
        Route::get('/{menu_id}/edit-item/{item_id}','editItem')->name('menuItem.edit');
        Route::post('/{menu_id}/update-item/{item_id}', 'updateItem')->name('menuItem.update');
        Route::get('/{menu_id}/delete-item/{item_id}', 'deleteItem')->name('menuItem.delete');
    });

});
