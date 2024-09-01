<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Livewire\Items;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/offline/tags', [TagController::class, 'offlineIndex'])->name('offline.tags.index');
Route::get('/offline/listings', [ListingController::class, 'offlineIndex'])->name('offline.listings.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('listings', [ListingController::class, 'index'])->name('listing.index');
    Route::get('tags', [TagController::class, 'index'])->name('tag.index');
    Route::get('items', Items::class)->name('item.index');
});

require __DIR__.'/auth.php';
