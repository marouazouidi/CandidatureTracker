<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\InterviewController;

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

    Route::prefix('/candidatures')->group(function(){

        Route::controller(CandidatureController::class)->group(function(){
            Route::get('/', 'index')->name('candidatures.index');
            Route::get('/create', 'create')->name('candidatures.create');
            Route::post('/', 'store')->name('candidatures.store');
            Route::get('/archives', 'archives')->name('candidatures.archives');
            Route::get('/{candidature}', 'show')->name('candidatures.show');
            Route::get('/{candidature}/edit', 'edit')->name('candidatures.edit');
            Route::put('/{candidature}', 'update')->name('candidatures.update');
            Route::delete('/{candidature}', 'archive')->name('candidatures.archive');
            Route::patch('/{candidature}/restore', 'restore')->name('candidatures.restore')->withTrashed();
            Route::delete('/{candidature}/force', 'forceDelete')->name('candidatures.forceDelete')->withTrashed();
        });

        Route::controller(InterviewController::class)->group(function(){
            Route::get('/{candidature}/interviews', 'index')->name('interviews.index');
            Route::get('/{candidature}/interviews/create', 'create')->name('interviews.create');
            Route::post('/{candidature}/interviews', 'store')->name('interviews.store');
            Route::get('/{candidature}/interviews/{interview}', 'show')->name('interviews.show');
            Route::get('/{candidature}/interviews/{interview}/edit', 'edit')->name('interviews.edit');
            Route::put('/{candidature}/interviews/{interview}', 'update')->name('interviews.update');
            Route::delete('/{candidature}/interviews/{interview}', 'destroy')->name('interviews.destroy');
        });
    });
});

require __DIR__.'/auth.php';