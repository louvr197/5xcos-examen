<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[BattleController::class,'index']);
Route::get('/battles/{battle}', [BattleController::class, 'show'])->name('front.battles.show');
Route::post('/votes', [VoteController::class, 'store'])->name('votes.store')->middleware('auth');

require __DIR__ . '/auth.php';
