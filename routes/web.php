<?php

use App\Http\Controllers\EmailController;
use App\Http\Livewire\Controls;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MusicController::class, 'index']);
Route::get('player/', [MusicController::class, 'show'])->name('musicPlayer');

Route::get('/controls', Controls::class);

Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('create/', [MusicController::class, 'create']);
    Route::post('/', [MusicController::class, 'store']);
    Route::get('song/{song}/edit', [MusicController::class, 'edit']);
    Route::put('song/{song}',[MusicController::class,'update'])->name('song.update');
    Route::delete('song/{song}', [MusicController::class, 'destroy']);
});

require __DIR__.'/auth.php';
