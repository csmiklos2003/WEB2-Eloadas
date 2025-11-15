<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\PilotaController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/adatbazis', [AdatbazisController::class, 'index'])->name('adatbazis');

Route::resource('crud', PilotaController::class);

Route::get('/kapcsolat', [ContactController::class, 'show'])->name('contact.show');
Route::post('/kapcsolat', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/uzenetek', [App\Http\Controllers\MessageController::class, 'index'])
         ->name('messages.index');
});

Route::get('/diagram', [App\Http\Controllers\DiagramController::class, 'index'])
    ->name('diagram');



   

require __DIR__.'/auth.php';
