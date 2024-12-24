<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guestbook', [GuestbookController::class, 'index']);

Route::post('/guestbook', [GuestbookController::class, 'store']);
