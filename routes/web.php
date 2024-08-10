<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/barang', [ItemsController::class, 'index'])->name('barang');
    Route::get('/barang/tambah', [ItemsController::class, 'create'])->name('barang.create');
    Route::post('/barang/tambah', [ItemsController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit/{items}', [ItemsController::class, 'edit'])->name('barang.edit');
    Route::patch('/barang/edit/{items}', [ItemsController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [ItemsController::class, 'destroy'])->name('barang.destroy');
    Route::get('/items', [ItemsController::class, 'getItems']);
    Route::post('/check-qr-code', [ItemsController::class, 'checkQRCode']);
    // Route::post('/check-qr-code', [ItemsController::class, 'checkQRCode']);

    Route::get('/transaksi/in', [TransactionController::class, 'index'])->name('transaksi.in');
    Route::get('/transaksi/out', [TransactionController::class, 'index2'])->name('transaksi.out');

    Route::get('/scan/in', [TransactionController::class, 'create_in'])->name('scan.in');
    Route::get('/scan/out', [TransactionController::class, 'create_out'])->name('scan.out');
    Route::post('/scan/in', [TransactionController::class, 'store_in'])->name('scan.in.store');
    Route::post('/scan/out', [TransactionController::class, 'store_out'])->name('scan.out.store');

    Route::post('/print/qr/{id}', [ItemsController::class, 'printqr'])->name('barang.printqr');
});

// useless routes
// Just to demo sidebar dropdown links active states.
Route::get('/buttons/text', function () {
    return view('buttons-showcase.text');
})->middleware(['auth'])->name('buttons.text');

Route::get('/buttons/icon', function () {
    return view('buttons-showcase.icon');
})->middleware(['auth'])->name('buttons.icon');

Route::get('/buttons/text-icon', function () {
    return view('buttons-showcase.text-icon');
})->middleware(['auth'])->name('buttons.text-icon');

require __DIR__ . '/auth.php';
