<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\DiscussionController;
use App\Models\Discussion;

Route::get('/', function () {
    return view('forum',[
        'discussions' => Discussion::latest()->paginate(3)
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('channels', ChannelController::class);
    Route::resource('discussions', DiscussionController::class)->except(['destroy','update'])
    ->parameters(['discussions' =>'slug']);

});