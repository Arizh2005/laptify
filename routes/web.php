<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\SimulationController;
use App\Http\Controllers\Admin\LaptopController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'userMiddleware'])->group(function(){
    Route::get('dashboard',[UserController::class, 'index'])->name('dashboard');
    Route::get('favorite',[FavoriteController::class, 'index'])->name('user.favorite');
    Route::get('simulation',[SimulationController::class, 'index'])->name('user.simulation');
    Route::post('match-check', [SimulationController::class, 'checkMatch'])->name('match.check');

});

Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

});

Route::get('simulation', [SimulationController::class, 'showForm'])->name('user.simulation');

// Rute untuk memproses form pencocokan
Route::post('match-check', [SimulationController::class, 'checkMatch'])->name('match.check');

Route::get('/laptop/{id}', [SimulationController::class, 'showLaptop'])->name('laptop.show');

Route::resource('laptops', LaptopController::class)->except(['create', 'edit']);

