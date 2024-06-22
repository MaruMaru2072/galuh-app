<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CommentController;


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
    Route::get('forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('forum', [ForumController::class, 'store'])->name('forum.store');
    Route::post('forum/{forum}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/dashboard', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/dashboard', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/dashboard/password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::delete('/dashboard', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about');

require __DIR__.'/auth.php';
