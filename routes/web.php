<?php

use App\Http\Controllers\GuestHomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [GuestHomeController::class, 'index'])->name('home');
Route::get('/lessons/{lesson}', [GuestHomeController::class, 'show'])->name('lesson.show');

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
