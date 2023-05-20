<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UI\BackEnd\TagController;
use App\Http\Controllers\UI\BackEnd\HomeController;
use App\Http\Controllers\UI\BackEnd\PageController;
use App\Http\Controllers\UI\BackEnd\UserController;
use App\Http\Controllers\UI\BackEnd\SkillController;
use App\Http\Controllers\UI\BackEnd\VideoController;
use App\Http\Controllers\UI\BackEnd\MessageController;
use App\Http\Controllers\UI\BackEnd\CategoryController;
use App\Http\Controllers\UI\BackEnd\BackEndHomeController;
use App\Http\Controllers\UI\FrontEnd\HomeController as FrontEndHomeController;

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

Route::controller(FrontEndHomeController::class)->group(function () {
    Route::get('/', 'welcome')->name('frontend.landing');
    Route::get('/home', 'index')->name('frontend.home');
    Route::get('/skill/{id}', 'skills')->name('front.skills');
    Route::get('/tag/{id}', 'tags')->name('front.tags');
    Route::get('/category/{id}', 'categories')->name('front.categories');
    Route::get('/video/{id}', 'video')->name('front-end.video');
    Route::post('/contacts', 'storeMessage')->name('contacts.store');
});



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
        Route::resource('messages', MessageController::class)->only(['index', 'destroy', 'edit']);
        Route::prefix('comments')->group(function () {
            Route::controller(VideoController::class)->group(function () {
                Route::post('/', 'commentStore')->name('comments.store');
                Route::get('/delete/{id}', 'deleteComment')->name('comments.delete');
                Route::post('/updates/{id}', 'updateComment')->name('comments.update');
            });
            Route::post('/update/{comment}', [FrontEndHomeController::class, 'updateComment'])->name('front.commentsUpdate');
            Route::post('/store', [FrontEndHomeController::class, 'storeComment'])->name('front.commentsStore');
        });

        Route::post('messages/reply/{id}', [MessageController::class, 'reply'])->name('message.reply');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::controller(FrontEndHomeController::class)->group(function () {
    Route::get('/page/{id}', 'page')->name('front.page');
    Route::get('/profile/{id}', 'profile')->name('front.profile');
    Route::post('/profile', 'update')->name('profile.userUpdate');
});
