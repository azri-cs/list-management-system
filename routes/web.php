<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Livewire\Items;
use App\Livewire\Listings;
use App\Livewire\ListingsEdit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/offline/tags', [TagController::class, 'offlineIndex'])->name('offline.tags.index');
Route::get('/offline/listings', [ListingController::class, 'offlineIndex'])->name('offline.listings.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('listings', Listings::class)->name('listings.index');
    Route::get('listings/{listing}/edit', ListingsEdit::class)->name('listings.edit');
    Route::get('tags', [TagController::class, 'index'])->name('tags.index');
    Route::get('items', Items::class)->name('items.index');
});

require __DIR__.'/auth.php';
