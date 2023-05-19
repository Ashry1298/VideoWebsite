<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BackEnd\TagController;
use App\Http\Controllers\BackEnd\HomeController;
use App\Http\Controllers\BackEnd\PageController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BackEnd\SkillController;
use App\Http\Controllers\BackEnd\VideoController;
use App\Http\Controllers\BackEnd\MessageController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\BackEndHomeController;
use App\Http\Controllers\FrontEnd\HomeController as FrontEndHomeController;

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

Route::get('/', [FrontEndHomeController::class,'welcome'])->name('frontend.landing');

Route::get('/home', [FrontEndHomeController::class, 'index'])->name('frontend.home');
Route::get('/skill/{id}', [FrontEndHomeController::class, 'skills'])->name('front.skills');
Route::get('/tag/{id}', [FrontEndHomeController::class, 'tags'])->name('front.tags');
Route::get('/category/{id}', [FrontEndHomeController::class, 'categories'])->name('front.categories');
Route::get('/video/{id}', [FrontEndHomeController::class, 'video'])->name('front-end.video');

Route::post('/contacts', [FrontEndHomeController::class, 'storeMessage'])->name('contacts.store');


require __DIR__ . '/auth.php';

Route::middleware('IsAdmin')->group(function () {
    
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/home', [BackEndHomeController::class, 'index'])->name('admin.home');
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('skills', SkillController::class)->except(['show']);
        Route::resource('tags', TagController::class)->except(['show']);
        Route::resource('pages', PageController::class)->except(['show']);
        Route::resource('videos', VideoController::class)->except(['show']);
        Route::resource('messages', MessageController::class)->only(['index','destroy','edit']);
        Route::post('comments', [VideoController::class, 'commentStore'])->name('comments.store');
        Route::get('comments/delete/{id}', [VideoController::class, 'deleteComment'])->name('comments.delete');
        Route::post('comments/updates/{id}', [VideoController::class, 'updateComment'])->name('comments.update');
        Route::post('comments/update/{id}', [FrontEndHomeController::class, 'updateComment'])->name('front.commentsUpdate');
        Route::post('comments/store', [FrontEndHomeController::class, 'storeComment'])->name('front.commentsStore');
        Route::post('messages/reply', [MessageController::class, 'reply'])->name('message.reply');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/page/{id}',[FrontEndHomeController::class,'page'])->name('front.page');
Route::get('/profile/{id}',[FrontEndHomeController::class,'profile'])->name('front.profile');
Route::post('/profile', [FrontEndHomeController::class, 'update'])->name('profile.userUpdate');
