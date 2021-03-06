<?php

use App\Http\Controllers\Api\NewsController;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/news', 'Api\NewsController@all');
Route::get('/news/{slug}','Api\NewsController@getBySlug');
Route::get('/decisions', 'Api\DecisionController@all');
Route::get('/decision/{slug}', 'Api\DecisionController@getBySlug');
Route::get('/staff', 'Api\StaffController@all');
Route::get('/staff/{id}', 'Api\StaffController@getById');
Route::get('/page/{slug}', 'Api\PageController@getBySlug');
Route::get('/vacancy', 'Api\VacancyController@all');
Route::get('/vacancy/{id}', 'Api\VacancyController@getById');
Route::get('/gallary/images', 'Api\GallaryController@images');
Route::get('/gallary/videos', 'Api\GallaryController@videos');
Route::get('/resources', 'Api\UsefullResourceController@resources');
Route::get('/menu/{slug}', 'Api\MenuController@getMenu');
Route::post('/send-message', 'Api\HomeController@send');
Route::get('/slides', 'Api\HomeController@slides');
