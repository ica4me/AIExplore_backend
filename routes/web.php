<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Add Content
Route::get('/contents/add', [ContentController::class, 'create'])->middleware(['auth'])->name('contents.create');
Route::post('/contents/add', [ContentController::class, 'store'])->middleware(['auth'])->name('contents.store');

// View All Contents
//Route::get('/viewcontent', [ContentController::class, 'index'])->middleware(['auth'])->name('contents.index');
Route::get('/viewcontent', [ContentController::class, 'index'])->name('contents.index');

// View Content by ID
//Route::get('/contents/{id}', [ContentController::class, 'show'])->middleware(['auth'])->name('contents.show');
Route::get('/contents/{id}', [ContentController::class, 'show'])->name('contents.show');

// Edit Content
Route::get('/contents/edit/{id}', [ContentController::class, 'edit'])->middleware(['auth'])->name('contents.edit');
Route::put('/contents/update/{id}', [ContentController::class, 'update'])->middleware(['auth'])->name('contents.update');

// Delete Content
Route::delete('/contents/delete/{id}', [ContentController::class, 'destroy'])->middleware(['auth'])->name('contents.destroy');

//Route untuk logout
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');



require __DIR__.'/auth.php';

