<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', "App\Http\Controllers\AdminController@admin")->name('admin');
    Route::get('/users', [AdminController::class, 'users'])->name('adminUsers');
    Route::get('/products', [AdminController::class, 'products'])->name('adminProducts');
    Route::get('/categories', [AdminController::class, 'categories'])->name('adminCategories');
    Route::get('/enterAsUser/{id}', [AdminController::class, 'enterAsUser'])->name('enterAsUser');
});

Route::get('/profile/{id}', [ProfileController::class, 'profile'])->name('profile');
Route::post('/profile/save', [ProfileController::class, 'save'])->name('saveProfile');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

