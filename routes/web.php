<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'contact']);
});

Route::get('/category', function () {
    return view('category', ['title' => 'Category']);
});

Route::get('/search-result', function () {
    return view('search-result', ['title' => 'search-result']);
});

Route::get('/single-post', function () {
    return view('single-post', ['title' => 'single-post']);
});

Route::get('/login', function () {
    return view('login', ['title' => 'login']);
});

Route::get('/register', function () {
    return view('register', ['title' => 'register']);
});

Route::get('/password', function () {
    return view('password', ['title' => 'password']);
});

