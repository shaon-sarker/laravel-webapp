<?php

use App\Http\Controllers\Backend\ExportImportController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/product',ProductController::class);
Route::get('/product/product-purchase/{id}', [ProductController::class, 'purchaseProduct']);

Route::get('/import', [ExportImportController::class, 'index'])->name('product_import');
Route::post('/import/store', [ExportImportController::class, 'store'])->name('product_import_store');
Route::get('/export', [ExportImportController::class, 'export'])->name('product_export');


require __DIR__.'/auth.php';
