<?php

declare(strict_types=1);

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubredditController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/r/{subreddit:name}', [SubredditController::class, 'show'])->name('subreddit.show');
Route::get('/r/{subreddit:name}/posts/{post}', [PostController::class, 'show'])->name('post.show');

Route::middleware(['auth'])->group(function (): void {
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/replies', [CommentController::class, 'reply'])->name('comments.reply');
});

require __DIR__.'/auth.php';
