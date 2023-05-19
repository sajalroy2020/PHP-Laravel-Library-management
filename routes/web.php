<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;


// Home or Other page route
Route::get('/', [HomeController::class,'Home'])->name('home');
Route::get('/post-list', [PostController::class,'show'])->name('postList');

// Auth route
Route::get('/sign-up', [UserController::class,'Signup'])->name('signup');
Route::post('/signupStore', [UserController::class,'SignupStore'])->name('signupStore');
Route::get('/sign-in', [UserController::class,'Signin'])->name('signin');
Route::post('/signinStore', [UserController::class,'SigninStore'])->name('signinStore');
Route::post('/logout', [UserController::class,'Logout'])->name('logout');

// User route
Route::middleware(['auth'])->group(function () {
    Route::get('/post-create', [PostController::class,'index'])->name('post');
    Route::post('post-store', [PostController::class,'store'])->name('post_store');
    Route::get('post-edit/{id}', [PostController::class,'edit'])->name('post_edit');
    Route::post('post-update/{id}', [PostController::class,'update'])->name('post_update');
    Route::get('post-destroy/{id}', [PostController::class,'destroy'])->name('post_destroy');
    Route::get('single-post/{id}', [PostController::class,'details'])->name('single_post');

    Route::post('post-comment/{id}', [CommentController::class,'commentPost'])->name('commentPost');
});

// Admin route
Route::group(['middleware' => ['auth', 'isAdmin']], function() {
    Route::get('/admin/dashboard', [DashboardController::class,'index'])->name('adminDashboard');

    Route::get('/admin/category', [CategoryController::class,'index'])->name('category');
    Route::post('/admin/category', [CategoryController::class,'store'])->name('categoryStore');
    Route::get('/admin/category-edit/{id}', [CategoryController::class,'edit'])->name('category_edit');
    Route::post('/admin/category/{id}', [CategoryController::class,'update'])->name('categoryUpdate');
    Route::get('/admin/category/{id}', [CategoryController::class,'destroy'])->name('category_destroy');

    Route::get('/user', [UserController::class,'user'])->name('user');


});

