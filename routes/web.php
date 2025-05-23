<?php

use App\Http\Controllers\MessageController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::redirect('/messages', '/');

Route::resource('messages', MessageController::class)
->only('store', 'show');

Route::get('/', function () {
    $messages = Message::query()
        ->whereNull('parent_id')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get()
        ->sortBy('created_at')
    ;
    return view('welcome', compact('messages'));
});
