<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ForumController;

Route::get('/', [DiscussionController::class, 'index']);
Route::get('/dashboard', [DiscussionController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::resource('discussions', DiscussionController::class)->except(['destroy','update'])->parameters(['discussions' =>'slug']);
Route::post('/discussion/{slug}/reply', [DiscussionController::class, 'reply'])->name('reply.store');

Route::get('/discussion/{id}/like', [ForumController::class, 'like'])->name('discuss.like');
Route::get('/discussion/{id}/unlike', [ForumController::class, 'unlike'])->name('discuss.unlike');

 
require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('channels', ChannelController::class);  
});