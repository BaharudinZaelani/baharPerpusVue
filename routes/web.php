<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentController as Rent;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/vue');
});

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('dashboard/profile', [App\Http\Controllers\ProfileController::class, 'index']);
Route::post('/edit/name', [App\Http\Controllers\ProfileController::class, 'uabahNama']);

// Buku Route
Route::get('/buku/tambah/', [BookController::class, 'tambahShow']);
Route::post('/buku/tambah', [BookController::class, 'store']);
Route::get('/buku/{lower}', [BookController::class, 'show']);
Route::get('/buku/delete/{id}', [BookController::class, 'destroy']);
Route::post('/buku/export', [DashboardController::class, 'exportBook'])->name('export');
Route::post('/book/import', [DashboardController::class, 'importBook'])->name('import');

// user
Route::get('/buku/pinjam/{id}', [Rent::class, 'rent']);

// vue
Route::get('/vue/{any?}', function(){
    return view('vue');
});
Route::get('/vue/detail/{any?}', function(){
    return view('vue');
});