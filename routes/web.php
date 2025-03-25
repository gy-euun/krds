<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignGuideController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/design-guide', [DesignGuideController::class, 'index'])->name('design-guide.index');
Route::get('/design-guide/{component}', [DesignGuideController::class, 'showComponent'])->name('design-guide.component');
