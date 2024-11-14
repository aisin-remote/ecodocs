<?php

use App\Http\Controllers\ApprovalController;
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

// AUTH
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login-proses', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register-proses', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//DASHBOARD
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// MASTER CRUD DESTINATION
Route::middleware('role:admin')->prefix('destination')->name('destination.')->group(function () {
    Route::get('/', [DestinationController::class, 'index'])->name('index');
    Route::get('/data', [DestinationController::class, 'getData'])->name('data');
    Route::post('/store', [DestinationController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [DestinationController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [DestinationController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [DestinationController::class, 'destroy'])->name('destroy');
});
// MASTER CRUD LIMBAH
Route::middleware('role:admin')->prefix('limbah')->name('limbah.')->group(function () {
    Route::get('/', [LimbahController::class, 'index'])->name('index');
    Route::get('/data', [LimbahController::class, 'getData'])->name('data');
    Route::post('/store', [LimbahController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LimbahController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [LimbahController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [LimbahController::class, 'destroy'])->name('destroy');
});

// CRUD REPORT 
Route::middleware('auth')->prefix('report')->name('report.')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('index');
    Route::get('/data', [ReportController::class, 'getData'])->name('data');
    Route::post('/store', [ReportController::class, 'store'])->name('store');
    Route::get('/edit/{report_id}', [ReportController::class, 'edit'])->name('edit');
    Route::put('/update/{report_id}', [ReportController::class, 'update'])->name('update');
    Route::delete('/delete/{report_id}', [ReportController::class, 'destroy'])->name('destroy');
    Route::get('/report/{report_id}', [ReportController::class, 'show'])->name('show');
});

Route::middleware('admin')->prefix('approval')->name('approval.')->group(function () {
    Route::get('/', [ApprovalController::class, 'index'])->name('index');
    Route::get('/data', [ApprovalController::class, 'getData'])->name('data');
    Route::post('/approve/{id}', [ApprovalController::class, 'approve'])->name('approve');
    Route::get('/reject/{id}', [ApprovalController::class, 'reject'])->name('reject');
    Route::put('/update/{id}', [ApprovalController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ApprovalController::class, 'destroy'])->name('destroy');
    Route::get('/report/{id}', [ApprovalController::class, 'show'])->name('show');
});
