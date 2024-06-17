<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index'])->name('post.index'); // Все посты
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create'); // Создание поста
Route::post('/posts', [PostController::class, 'store'])->name('post.store'); // Сохранение поста
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show'); // Просмотр поста
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit'); // Редактирование поста
Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update'); // Обновление поста
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy'); // Удаление поста
