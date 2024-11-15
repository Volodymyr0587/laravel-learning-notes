<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ResourceTypeController;

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

    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('images.destroy');

    Route::get('/trash', [NoteController::class, 'trash'])->name('notes.trash');
    Route::post('/restore/{note}', [NoteController::class, 'restore'])->withTrashed()->name('notes.restore');
    Route::post('/restore-all', [NoteController::class, 'restoreAll'])->withTrashed()->name('notes.restore-all');
    Route::delete('/force-delete/{note}', [NoteController::class, 'forceDelete'])->withTrashed()->name('notes.force-delete');
    Route::delete('/force-delete-all', [NoteController::class, 'forceDeleteAll'])->name('notes.forceDeleteAll');
});

require __DIR__ . '/auth.php';
