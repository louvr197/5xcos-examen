<?php

use App\Http\Controllers\BattleController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [BattleController::class, 'index'])->name('front.battles.index');
Route::get('/battles/create', [BattleController::class, 'create'])->name('front.battles.create')->middleware('auth');
Route::post('/battles/store',[BattleController::class,'store'])->name('battles.store')->middleware('auth');
Route::get('/battles/{battle}', [BattleController::class, 'show'])->name('front.battles.show');

Route::post('/memes/{meme}/vote', [VoteController::class, 'store'])->name('votes.store')->middleware('auth');

Route::get('memes/{meme}', [MemeController::class, 'show'])->name('front.memes.show');

Route::post('/battles/{battle}/upload', [MemeController::class, 'store'])->name('memes.store')->middleware('auth');

require __DIR__ . '/auth.php';
