<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CertificationController;


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

Route::middleware(['auth'])->group(function () {
    Route::resource('cvs', CVController::class);

    Route::prefix('cvs/{cv}')->group(function () {
        Route::resource('experiences', ExperienceController::class)->except(['index', 'show', 'create']);
        Route::resource('education', EducationController::class)->except(['index', 'show', 'create']);
        Route::resource('skills', SkillController::class)->except(['index', 'show', 'create']);
        Route::resource('languages', LanguageController::class)->except(['index', 'show', 'create']);
        Route::resource('certifications', CertificationController::class)->except(['index', 'show', 'create']);
    });
});


require __DIR__.'/auth.php';
