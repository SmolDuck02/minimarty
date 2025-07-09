<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoodController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Dashboard routes
    Route::get('/dashboard', [GoodController::class, 'dashboard'])->name('dashboard');

    // Goods routes
    Route::resource('goods', GoodController::class);
    Route::post('/goods/{good}/buy', [GoodController::class, 'buy'])->name('goods.buy');
});


require __DIR__.'/auth.php';
