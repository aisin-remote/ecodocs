<?php

use App\Http\Controllers\AuthController;
use App\Models\Report;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimbahController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\HomeController;

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
    return view('pages.auth.login');
});
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login-proses', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register-proses', [AuthController::class, 'register'])->name('register');

//Dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// MASTER CRUD DESTINATION
Route::middleware('role:admin')->prefix('destination')->name('destination.')->group(function () {
    Route::get('/', [DestinationController::class, 'index'])->name('index');
    Route::get('/data', [DestinationController::class, 'getData'])->name('data');
    Route::post('/store', [DestinationController::class, 'store'])->name('store');
    Route::get('/edit', [DestinationController::class, 'edit'])->name('edit');
    Route::post('/update', [DestinationController::class, 'update'])->name('update');
    Route::post('/delete', [DestinationController::class, 'destroy'])->name('destroy');
});
// MASTER CRUD LIMBAH
Route::middleware('role:admin')->prefix('limbah')->name('limbah.')->group(function () {
    Route::get('/', [LimbahController::class, 'index'])->name('index');
    Route::get('/data', [LimbahController::class, 'getData'])->name('data');
    Route::post('/store', [LimbahController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LimbahController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [LimbahController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LimbahController::class, 'destroy'])->name('destroy');
});


Route::get('/report', [ReportController::class, 'index'])->name('report.index');
