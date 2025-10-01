<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{slug}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/blog/author/{user}', [BlogController::class, 'byAuthor'])->name('blog.byAuthor');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/posts', [DashboardController::class, 'posts'])->name('posts.index');
    Route::get('/posts/create', [DashboardController::class, 'createPost'])->name('posts.create');
    Route::get('/posts/{id}/edit', [DashboardController::class, 'editPost'])->name('posts.edit');
    Route::get('/categories', [DashboardController::class, 'categories'])->name('categories.index');
    Route::get('/comments', [DashboardController::class, 'comments'])->name('comments.index');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings.index');
});
