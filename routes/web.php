<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Author\DashboardController as AuthorDashboardController;
use App\Http\Controllers\Author\ProfileController as AuthorProfileController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.attempt');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');

Route::prefix('author')->name('author.')->group(function () {
    Route::get('/dashboard', [AuthorDashboardController::class, 'index'])->name('dashboard');
    Route::get('/posts', [AuthorDashboardController::class, 'posts'])->name('posts.index');
    Route::get('/posts/create', [AuthorDashboardController::class, 'createPost'])->name('posts.create');
    Route::get('/posts/{id}/edit', [AuthorDashboardController::class, 'editPost'])->name('posts.edit');

    Route::get('/profile', [AuthorProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [AuthorProfileController::class, 'update'])->name('profile.update');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/blog/author/{user}', [BlogController::class, 'byAuthor'])->name('blog.byAuthor');