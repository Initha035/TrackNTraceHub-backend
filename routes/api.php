<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAuth;
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

Route::middleware(CheckAuth::class)->group(function () {
    Route::get('/', function () {
        return 'Hello World';
    });
    Route::post('/postings', [PostingController::class, 'create']);
    Route::post('/postings/{id}/completed', [PostingController::class, 'complete']);
    Route::post('/postings/{id}/messages', [MessageController::class, 'create']);
    Route::put('/postings/{id}', [PostingController::class, 'update']);
    Route::delete('/postings/{id}', [PostingController::class, 'destroy']);
    Route::post('/postings/message', [MessageController::class, 'create']);
    Route::put('/changepassword', [UserController::class, 'changepassword']);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/postings', [PostingController::class, 'index']);
Route::get('/postings/{id}', [PostingController::class, 'show']);
