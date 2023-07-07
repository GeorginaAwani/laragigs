<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// all listings
Route::get('/', [ListingController::class, 'all']);

// the middleware uses the auth middleware to ensure only logged in users can access the route
// store new posting route
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show create form
// IMPORTANT this comes before listings/{listing} as it would try to match it and fail because  it doesn't meet the requirements
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// show manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// show edit form
// TODO : create a middleware to ensure only the owner of the listing can edit or delete
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// submit edit form
Route::put('listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// submit edit form
Route::delete('listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// single listing
// wildcards cards collect data from url. The wildcard must match the closure parameter
// by passing the argument as an instance of the Listing, we eliminate the need for the commented code
Route::get('/listings/{listing}', [ListingController::class, 'find'])->where('id', '[0-9]+');
// where uses constrains and accepts a regular expressions

// show register page
// the guest middleware is the opposite of the auth middleware and automatically redirects to home
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// log out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login page
Route::get('/login', [UserController::class, 'login'])->middleware('guest');

// log user in
// because middlewares use named routes, routes that middlewares would redirect to should be named.
Route::post('/login', [UserController::class, 'authenticate'])->name('login');
