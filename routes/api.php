<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::middleware(['jwt.auth'])->group(function () {
    Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
        Route::get('/posts', 'IndexController');
        Route::get('/posts/create', 'CreateController');
        Route::post('/posts', 'StoreController');
        Route::get('/posts/{post}', 'ShowController');
        Route::get('/posts/{post}/edit', 'EditController');
        Route::put('/posts/{post}', 'UpdateController');
        Route::delete('/posts/{post}', 'DestroyController');
    });
});
