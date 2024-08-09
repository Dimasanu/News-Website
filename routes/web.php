<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;


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

Route::get('/', [ArticleController::class, 'indexs'])->name('home'); 

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

Route::get('/category', [ArticleController::class, 'showAllCategories'])->name('all-categories');

Route::get('/category/{id}', [ArticleController::class, 'showc'])->name('category');

Route::get('/search-result', function () {
    return view('search-result', ['title' => 'search-result']);
});

Route::get('/single-post/{id}', [ArticleController::class, 'show'])->name('single-post');

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
})->name('dashboard')->middleware('auth');

Route::resource('user', UserController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::resource('users', UserController::class);

Route::resource('articledb', ArticleController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::resource('articles', ArticleController::class);

Route::resource('categorydb', CategoryController::class)->only(['index', 'store', 'update', 'destroy'])->middleware('auth');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::resource('categories', CategoryController::class);

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

