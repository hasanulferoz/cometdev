<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'showAdminLoginForm'])->name('admin.login');
Route::get('admin/register', [App\Http\Controllers\AdminController::class, 'showAdminRegisterForm'])->name('admin.register');
Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'showAdminDashboard'])->name('admin.dashboard');

 Route::post('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
 Route::post('admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');
 Route::post('admin/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('admin.register');


 //Post Route

 //Route::resource('post', 'App\Http\Controllers\PostController');
 //Route::resource('post', PostController::class);
 Route::resource('category', 'App\Http\Controllers\CategoryController');
 Route::get('admin/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
 Route::get('admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
 Route::post('admin/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
 //Route::get('admin/product', [App\Http\Controllers\ProductController::class, 'showProduct'])->name('admin.show');