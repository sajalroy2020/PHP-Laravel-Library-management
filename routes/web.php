<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavouriteController;


// Home or Other page route
Route::get('/', [HomeController::class,'home'])->name('home');
Route::get('/single-book/{id}', [HomeController::class,'singleBook'])->name('single_book');
Route::get('/category-book/{id}', [HomeController::class,'categoryBook'])->name('categoryBook');
Route::get('/book-search', [HomeController::class,'search'])->name('search');


// Auth route
Route::get('/sign-up', [UserController::class,'Signup'])->name('signup');
Route::post('/signupStore', [UserController::class,'SignupStore'])->name('signupStore');
Route::get('/sign-in', [UserController::class,'Signin'])->name('signin');
Route::post('/signinStore', [UserController::class,'SigninStore'])->name('signinStore');
Route::post('/logout', [UserController::class,'Logout'])->name('logout');

// User route
Route::middleware(['auth'])->group(function () {
    Route::post('/favourite-store', [FavouriteController::class,'store'])->name('favouriteStore');
    Route::get('/profile', [HomeController::class,'profile'])->name('profile');
    Route::get('/favourite-delete/{id}', [FavouriteController::class,'favouriteDelete'])->name('favouriteDelete');
    Route::post('/review-store', [ReviewController::class,'reviewStore'])->name('reviewStore');
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
    Route::get('/user-edit/{id}', [UserController::class,'edit'])->name('user_edit');
    Route::get('/user-destroy/{id}', [UserController::class,'destroy'])->name('user_destroy');


    Route::get('/admin/book', [BookController::class,'index'])->name('book');
    Route::post('/admin/book-store', [BookController::class,'store'])->name('bookStore');
    Route::get('/admin/book-edit/{id}', [BookController::class,'edit'])->name('book_edit');
    Route::get('/admin/book-destroy/{id}', [BookController::class,'destroy'])->name('book_destroy');
    Route::post('/admin/book-update/{id}', [BookController::class,'update'])->name('bookUpdate');



});

