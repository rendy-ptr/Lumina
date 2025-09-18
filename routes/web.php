<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/1', 'home')->name('home');
// Route::view('/note', 'note')->name('note');
