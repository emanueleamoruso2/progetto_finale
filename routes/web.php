<?php

use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\LanguageController;

Route::get('/',[PublicController::class,'homepage'])->name('homepage');
Route::get('/announce/create',[AnnounceController::class,'create'])->name('announce.create')->middleware('auth');
Route::get('/announce/index',[AnnounceController::class,'index'])->name('announce.index');
Route::get('/announce/{announce}', [AnnounceController::class, 'show'])
    ->name('announce.show');

// richiesta revisore
Route::get('/WorkwithUs',[PublicController::class,'WorkwithUs'])->name('WorkwithUs')->middleware('auth');

Route::post('/richiesta_revisore_effettuata',[PublicController::class,'SendEmail'])->name('SendEmail');

Route::get('/revisor', [RevisorController::class, 'index'])->middleware(['auth', 'revisor'])->name('revisor.index');

Route::patch('/revisor/announce/{announce}/accept', [RevisorController::class, 'accept'])->middleware(['auth', 'revisor'])
->name('revisor.accept');

Route::patch('/revisor/announce/{announce}/reject', [RevisorController::class, 'reject'])->middleware(['auth', 'revisor'])->name('revisor.reject');

Route::patch('/revisor/undo', [RevisorController::class, 'review'])
->middleware(['auth', 'revisor'])->name('revisor.review');

Route::get('/make-revisor/{email}', [PublicController::class, 'makeRevisor'])->name('make.revisor');

// Rotte per gestire il cambio di lingua
Route::get('/language/{language}', [LanguageController::class,'changelanguage'])
->name('language.change');