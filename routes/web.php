<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;

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

Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('/forum/create', [ForumController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('/forum', [ForumController::class, 'store'])->name('forum.store')->middleware('auth');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about');

Route::get('/storepage', [StoreController::class, 'index'])->name('store.index');
Route::get('/storepage/create', [StoreController::class, 'create'])->name('store.create')->middleware('auth');
Route::post('/storepage', [StoreController::class, 'store'])->name('store.store')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'createCart'])->middleware('auth');

Route::get('/itemDetailView/{itemId}',[StoreController::class, 'checkItemDetailView'])->middleware('auth');

// addItemToCart
// ->name('additem.to.cart')
// Route::get('/cart', [])



require __DIR__.'/auth.php';
