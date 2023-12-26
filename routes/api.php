<?php

use App\Http\Controllers\Api\ContentController as ApiContentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\ContentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/register', [ApiAuthController::class, 'Register']); // Register
Route::post('/login', [ApiAuthController::class, 'Login']); // Login

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//untuk mendapatkan API 
//Route::get('/content', [ContentController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/current-user', [ApiAuthController::class, 'CurrentUser']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update-current-user', [ApiAuthController::class, 'UpdateCurrentUser']);
});



//untuk tabel kontent
Route::get('/contents', [ApiContentController::class, 'index']);

