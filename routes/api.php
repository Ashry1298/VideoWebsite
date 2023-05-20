<?php

// use App\Http\Controllers\API\BackEnd\;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\API\BackEnd\TagController;
use App\Http\Controllers\API\BackEnd\PageController;
use App\Http\Controllers\API\BackEnd\UserController;
use App\Http\Controllers\API\BackEnd\SkillController;
use App\Http\Controllers\API\BackEnd\VideoController;
use App\Http\Controllers\API\BackEnd\MessageController;
use App\Http\Controllers\API\BackEnd\CategoryController;
use App\Http\Controllers\API\BackEnd\BackEndHomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::prefix('admin')->group(function () {
        Route::get('/home', [BackEndHomeController::class, 'index']);
        Route::apiResource('/videos', VideoController::class);
        Route::apiResource('/categories', CategoryController::class);
        Route::apiResource('/skills', SkillController::class);
        
        Route::apiResource('/tags', TagController::class);
        Route::apiResource('/pages', PageController::class);
        // Route::apiResource('/users', UserController::class);
        Route::apiResource('messages', MessageController::class)->only(['index','destroy','show']);
        Route::post('message/reply/{id}', [MessageController::class, 'reply']);
        Route::post('comments', [VideoController::class, 'commentStore']);
        Route::post('comments/updates/{id}', [VideoController::class,'updateComment']);
        Route::delete('comments/delete/{id}', [VideoController::class, 'deleteComment']);
    });
});

Route::post('/login', [AuthController::class, 'handleLogin']);
Route::post('/register', [AuthController::class, 'handleRegister']);
