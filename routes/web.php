<?php

use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\HomeController;
use App\Http\Controllers\BackEnd\PageController;
use App\Http\Controllers\BackEnd\SkillController;
use App\Http\Controllers\BackEnd\TagController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('skills', SkillController::class)->except(['show']);
        Route::resource('tags', TagController::class)->except(['show']);
        Route::resource('pages', PageController::class)->except(['show']);
        // Route::get('users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    });
});
