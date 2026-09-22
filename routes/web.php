<?php

use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class,'homepage'])->name('homepage');
Route::get('/announce/create',[AnnounceController::class,'create'])->name('announce.create')->middleware('auth');
Route::get('/announce/index',[AnnounceController::class,'index'])->name('announce.index');
Route::get('/announce/{announce}', [AnnounceController::class, 'show'])
    ->name('announce.show');