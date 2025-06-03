<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\AIController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);


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
    Route::get('/cvs/{cv}/generate', [AIController::class, 'generate'])->name('ai.generate');
    Route::post('/cvs/{cv}/generate/preview', [AIController::class, 'preview'])->name('ai.preview');
    Route::post('/cvs/{cv}/generate/save', [AIController::class, 'save'])->name('ai.save');
});

    



require __DIR__.'/auth.php';
