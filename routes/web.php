<?php

use App\Http\Controllers\ResourceTypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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


    Route::resource('notes', NoteController::class);
    Route::resource('resource-types', ResourceTypeController::class);
    Route::resource('categories', CategoryController::class);

    Route::get('/trash', [NoteController::class, 'trash'])->name('notes.trash');
    Route::patch('/restore/{id}', [NoteController::class, 'restore'])->name('notes.restore');
});

require __DIR__ . '/auth.php';
