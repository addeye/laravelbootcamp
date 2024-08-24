<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::get('/service', [PageController::class, 'service']);

Route::get('/service/create', [PageController::class, 'serviceCreate']);
Route::post('/service', [PageController::class, 'serviceDoCreate']);

Route::get('/service/{id}/edit', [PageController::class, 'serviceEdit']);
Route::put('/service/{id}', [PageController::class, 'serviceDoEdit']);

// Route::get('/service/{id}/delete', [PageController::class, 'serviceDoDelete']);
Route::delete('/service/{id}', [PageController::class, 'serviceDoDelete']);


Route::get('/portofolio', [PageController::class, 'portofolio']);
Route::get('/blog', [PageController::class, 'blog']);
Route::get('/faq', [PageController::class, 'faq']);
Route::get('/contact', [PageController::class, 'contact']);

Route::resource('products', ProductController::class);
Route::resource('transactions', TransactionController::class);

Route::post("cart-insert", [TransactionController::class, "cartInsert"]);
Route::post("cart-delete/{id}", [TransactionController::class, "cartDelete"]);
Route::get("cart-destroy", [TransactionController::class, "cartDestroy"]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
