<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
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

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/create', [CategoryController::class, 'create']);
Route::post('categories/create', [CategoryController::class, 'store']);
Route::get('categories/{id}/edit', [CategoryController::class, 'edit']);
Route::put('categories/{id}/edit', [CategoryController::class, 'update']);
Route::get('categories/{id}/delete', [CategoryController::class, 'destroy']);

Route::get('products', function () {
    return Product::get();
});

Route::get('products/create', [ProductController::class, 'create']);
Route::post('products/create', [ProductController::class, 'store']);

// Route::get('productone', function () {
//     return Product::create([
//         'name' => 'shoes two',
//         'description' => 'shoes description',
//         'small_description' => 'shoes small description',
//         'original_price' => 599,
//         'price' => 459,
//         'stock' => 40,
//         'is_active' => 1,
//     ]);
// });

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
