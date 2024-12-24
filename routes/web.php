<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestbookController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/guestbook', [GuestbookController::class, 'index']);

Route::post('/guestbook', [GuestbookController::class, 'store']);
