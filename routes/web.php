<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorFollowController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Author\DashboardController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Author\AuthorSettingController;
use App\Http\Controllers\BlogLikeController;
use App\Http\Controllers\Visitor\VisitorSettingController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.attempt');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.store');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('visitor')->name('visitor.')->group(function () {
    Route::get('/setting/edit', [VisitorSettingController::class, 'edit'])->name('setting.edit');
    Route::get('/setting', [VisitorSettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/update', [VisitorSettingController::class, 'update'])->name('setting.update');
});

Route::prefix('author')->name('author.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/blogs', [DashboardController::class, 'blogs'])->name('blogs.index');
    Route::get('/blogs/view/{slug}', [DashboardController::class, 'view'])->name('blogs.view');
    Route::get('/blogs/create', [DashboardController::class, 'createBlog'])->name('blogs.create');
    Route::post('/blogs', [DashboardController::class, 'storeBlog'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [DashboardController::class, 'editBlog'])->name('blogs.edit');
    Route::patch('/blogs/{id}', [DashboardController::class, 'updateBlog'])->name('blogs.update');
    Route::delete('/blogs/{id}', [DashboardController::class, 'destroyBlog'])->name('blogs.destroy');

    Route::get('/profile', [AuthorProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [AuthorProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [AuthorProfileController::class, 'update'])->name('profile.update');

    Route::get('/settings', [AuthorSettingController::class, 'index'])->name('setting.index');
    Route::get('/settings/edit', [AuthorSettingController::class, 'edit'])->name('setting.edit');
    Route::post('/settings/update', [AuthorSettingController::class, 'update'])->name('setting.update');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{slug}/comments', [CommentController::class, 'store'])
    ->middleware('auth')
    ->name('comments.store');
Route::get('/blog/author/{user}', [BlogController::class, 'byAuthor'])->name('blog.byAuthor');
Route::post('/blogs/{blog}/likes', BlogLikeController::class)
    ->middleware('auth')
    ->name('blogs.likes');
Route::post('/authors/{author}/follow', AuthorFollowController::class)
    ->middleware('auth')
    ->name('authors.follow');
