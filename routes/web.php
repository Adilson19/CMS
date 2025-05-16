<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\PostController;
use App\Http\Controllers\WebsiteController;

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
Route::view('contact-us', 'website.contact')->name('contact');
Route::controller(WebsiteController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/posts/{post}', 'show')->name('website.posts.show');
});

Auth::routes();

Route::prefix('auth')->middleware('auth')->group(function(){
    Route::get('auth/dashboard', [DashboardController::class, 'dashboard'])->name('auth.dashboard')->middleware('auth');
    Route::resource('auth/posts', PostController::class);
});


