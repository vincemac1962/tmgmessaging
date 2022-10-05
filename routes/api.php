<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SlideController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Slide;
use App\Http\Controllers\SiteController;


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

//create json array
Route::get('/posts', function(){
    return response()->json([
        'posts' => [
            [
                'title' => 'Page 1'
            ]
        ]
    ]);
});

//Route::resource('sites', SiteController::class);


//Public Routes for sites

Route::get('/sites/{id}', [SiteController::class, 'show']);
Route::get('sites/search/{site_ref}', [SiteController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::put('/sites/{id}', [SiteController::class, 'updateFromAPI']);

// Public routes for slides - currently all

Route::post('/slides', [SlideController::class, 'storeFromApi']);
Route::get('/slides/{id}', [SlideController::class, 'showFromApi']);
Route::get('slides/search/{search_string}', [SlideController::class, 'searchFromApi']);
Route::put('/slides/{id}', [SlideController::class, 'updateFromApi']);
Route::delete('slides/{id}', [SlideController::class, 'destroyFromApi']);

// Protected Routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/slides', [SlideController::class, 'index']);
	Route::get('/sites', [SiteController::class, 'index']);
    Route::post('/sites', [SiteController::class, 'store']);

    Route::delete('sites/{id}', [SiteController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
