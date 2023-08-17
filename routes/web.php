<?php

use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\ReceiptsController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');

    Route::get('/receipts', [ReceiptsController::class, 'index'])->name('receipts.index');
    Route::get('/receipts/{receipt_id}', [ReceiptsController::class, 'show'])->name('receipts.show');

    Route::get('/ingredients', [IngredientsController::class, 'index'])->name('ingredients.index');

    Route::get('/purchases', [PurchasesController::class, 'index'])->name('purchases.index');
});

require __DIR__.'/auth.php';
