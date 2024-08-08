<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\ArticleController;



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

Route::get('/', [ArticleController::class, 'show'])->name('home'); 

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
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
    return view('/auth/login', ['title' => 'Login']);
});

Route::get('/register', function () {
    return view('/auth/register', ['title' => 'Register']);
});

Route::get('/password', function () {
    return view('/auth/password', ['title' => 'Reset Password']);
});

Route::get('/dashboard', function () {
    return view('admin.dashboard', ['title' => 'Admin Dashboard']);
});

Route::get('/account', function () {
    return view('admin.account', ['title' => 'Admin Account']);
});

Route::get('/article', function () {
    return view('admin.article', ['title' => 'Admin Article']);
});

Route::get('/admin/category', function () {
    return view('admin.category', ['title' => 'Admin Category']);
});

//login route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// register route
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//reset password
Route::get('/password-reset', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/password-reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset.post');

