<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function () { 
 
    Route::get('/get-main-categories', [App\Http\Controllers\Api\CategoriesController::class, 'index']);
    
});


//for no one can get on this api without specific password
Route::group(['middleware' => ['api', 'checkpassword']], function () { 
 
    Route::get('/get-main-categories-by-password', [App\Http\Controllers\Api\CategoriesController::class, 'index']);
    
});
//for  multi language
Route::group(['middleware' => ['api', 'checklanguage']], function () { 
 
    Route::get('/get-main-categories-by-lang', [App\Http\Controllers\Api\CategoriesController::class, 'getcategoriesByLang']);
    
Route::post('/change-category-status', [App\Http\Controllers\Api\CategoriesController::class, 'changeStatus']);
    
});

