<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
// Common Resource Routes
// index -= show all listings
// show - show individual listing
// create - show form to create new listing
// store - store new listing
// edit - show form to update listing
// update - update listing
// destroy - delete listing

// Listings Controller

// Functionality moved to Controller
// Index route (all listings)
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Store listing data route
Route::post('/listings', [ListingController:: class, 'store'])->middleware('auth');

// Show edit form
Route::get('/listings/{listing}/edit', [ListingController:: class, 'edit'])->middleware('auth');

// Update listing
Route::put('/listings/{listing}', [ListingController:: class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController:: class, 'destroy'])->middleware('auth');

// Manage listings
Route::get('/listings/manage', [ListingController:: class, 'manage'])->middleware('auth');

// Show single listing route
Route::get('/listing/{listing}', [ListingController:: class, 'show']);

/* User Functionality */

// Show Register/Create form
Route:: get('/register', [UserController:: class, 'create'])->middleware('guest');

// Create new user
Route:: post('/users', [UserController:: class, 'store']);

// Logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController:: class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController:: class, 'authenticate']);

/* Slide Functionality */
// Show Create Form - these routes may need to precede any routes with /slides/{wildcard} to work

// Show Create form
Route::get('/slides/create', [SlideController::class, 'create']);

// Store data
Route::post('/slides/store', [SlideController::class, 'store']);

// Manage listings
Route::get('/slides/manage', [SlideController:: class, 'manage']);

// Show edit form
Route::get('/slides/{slide}/edit', [SlideController:: class, 'edit']);

// Update listing
// ToDo: finish save functionality - currently failing on 'global' field
Route::put('/slides/{slide}', [SlideController:: class, 'update']);

// Delete listing
// ToDo: build out deletion
Route::delete('/slides/{slide}', [SlideController:: class, 'destroy']);

/* Admin routes */
// Control Panel
Route::get('/admin/controlpanel', [AdminController:: class, 'controlPanel']);
// Slides
Route::get('/admin/manageslides', [AdminController:: class, 'manageSlides']);
Route::get('/admin/slide/{slide}/edit', [AdminController:: class, 'editSlide']);
// Users
Route::get('/admin/manageusers', [AdminController:: class, 'manageUsers']);
Route::get('/admin/user/{user}/edit', [AdminController:: class, 'editUser']);
Route::put('/user/{user}', [UserController:: class, 'update']);
// Sites
Route::get('/admin/managesites', [AdminController:: class, 'manageSites']);
Route::get('/sites/{site}/edit', [AdminController:: class, 'editSite']);
Route::put('/admin/site/{site}/edit', [SiteController:: class, 'updateSite']);

/*
Route::get('/hello', function () {
    return  response('<h1>Hello World!</h1>', 200)
            ->header('Content-Type', 'text/plain')
            ->header('foo', 'bar');
});


// passing in variable plus adding constraints
Route::get('/posts/{id}', function($id){
    // with die/debug info
    //dd($id);
    return response('Post '.$id);
})->where('id', '[0-9]+');


Route::get('/search', function(Request $request){
    return $request->name . ' ' . $request->city;
});

*/
