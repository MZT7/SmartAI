<?php

use App\Http\Controllers\AutobotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['throttle:5,1'])->group(function () {
    Route::get('/autobots', [AutobotController::class, 'index']);
    Route::get('/autobots/{autobot}/posts', [AutobotController::class, 'posts']);
    Route::get('/posts/{post}/comments', [AutobotController::class, 'comments']);
});
