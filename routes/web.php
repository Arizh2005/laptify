<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\MatchController;
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

});

Route::middleware(['auth', 'adminMiddleware'])->group(function(){
    Route::get('admin/dashboard',[AdminController::class, 'index'])->name('admin.dashboard');

});

Route::get('/matching-form', [MatchController::class, 'showForm'])->name('match.form');

// Rute untuk memproses form pencocokan
Route::post('/match-check', [MatchController::class, 'checkMatch'])->name('matching.check');

Route::get('/laptop/{id}', [MatchController::class, 'showLaptop'])->name('laptop.show');

Route::resource('laptops', LaptopController::class)->except(['create', 'edit']);

Route::get('crud-table', [MatchController::class, 'showCrudTable'])->name('crud_table.index');
Route::post('crud-table', [MatchController::class, 'store'])->name('crud_table.store');
Route::put('crud-table/{id}', [MatchController::class, 'update'])->name('crud_table.update');
Route::delete('crud-table/{id}', [MatchController::class, 'destroy'])->name('crud_table.destroy');
Route::get('/crud-table/{id}', [MatchController::class, 'show'])->name('crud_table.show');
