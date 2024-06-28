<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatforumController;


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
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/forum', [ForumController::class, 'index'])->name('forum.index');
    Route::get('forum/create', [ForumController::class, 'create'])->name('forum.create');
    Route::post('forum', [ForumController::class, 'store'])->name('forum.store');
    Route::get('/forum/{id}', [ForumController::class, 'show'])->name('forum.show');
    Route::post('forum/{forum}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/catforum', [CatforumController::class, 'index'])->name('catforum.index');
    Route::get('/catforum/create', [CatforumController::class, 'create'])->name('catforum.create');
    Route::post('/catforum', [CatforumController::class, 'store'])->name('catforum.store');
    Route::get('/catforum/{id}/edit', [CatforumController::class, 'edit'])->name('catforum.edit');
    Route::put('/catforum/{id}', [CatforumController::class, 'update'])->name('catforum.update');
    Route::delete('/catforum/{id}', [CatforumController::class, 'destroy'])->name('catforum.destroy');
    Route::get('/dashboard', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/dashboard', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/dashboard/password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::delete('/dashboard', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('quotes', QuoteController::class)->except(['edit', 'update', 'show']);
    Route::post('/cartPage', [CartController::class, 'purchaseitem']);
    Route::get('/cartPage', [CartController::class, 'cart']);
    Route::get('/viewCarts', [CartController::class, 'cart']);
    Route::delete('/cartPage/{whichItem}', [CartController::class, 'deleteitemincart']);
    Route::get('/afterPurchase', [HistoryController::class, 'createHistory']);
    Route::get('/historyPage', [HistoryController::class, 'getHistory']);
    Route::post('/manageProductPage', [ProductController::class, 'manageproduct']);
    Route::get('/manageProductPage', [ProductController::class, 'manageproduct']);
    Route::get('/updateProduct/{whichitem}', [ProductController::class, 'updateproduct']);
    Route::post('/updateProduct/{idnya}', [ProductController::class, 'updatingproduct']);
    Route::get('/addProductPage', [ProductController::class, 'addproduct']);
    Route::post('/addProductPage', [ProductController::class, 'createproduct']);
    Route::get('/categoryPage/{whichcategory}', [CategoryController::class, 'categorypage']);
    Route::delete('/deleteitem/{whichitem}', [ProductController::class, 'deleteproduct']);
    Route::get('/manageCategory',[CategoryController::class, 'managecategory']);
    Route::post('/updateCategory/{whichcategory}',[CategoryController::class, 'updatecategory']);
    Route::delete('/deleteCategory/{whichcategory}',[CategoryController::class, 'deletecategory']);
    Route::post('/createCategory',[CategoryController::class, 'createcategory']);
    Route::post('/processPayment', [HistoryController::class, 'checkout']);
});

Route::get('forum', [ForumController::class, 'index'])->name('forum.index');
Route::get('forum/{forum}', [ForumController::class, 'show'])->name('forum.show');
Route::get('/about-us', [AboutUsController::class, 'index'])->name('about');

Route::get('/storepage', [ProductController::class, 'navigateStore']);

Route::get('/categoryPage/{whichCategory}', [CategoryController::class, 'navigateCategory']);

Route::post('/searchResultPage', [ProductController::class, 'aftersearching']);
Route::post('/searchResultPage', [ProductController::class, 'aftersearch']);
Route::get('/searchResultPage', [ProductController::class, 'searchpage']);
Route::get('/productDetailPage/{whichItem}', [CategoryController::class, 'productdetail']);
Route::get('/productDetailPage/{whichItem}', [ProductController::class, 'productdetail']);
require __DIR__.'/auth.php';
