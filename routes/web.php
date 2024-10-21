<?php

use App\Models\Report;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LimbahController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DestinationController;

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
    return view('pages.website.dashboard');
});

Route::get('/destination', [DestinationController::class, 'index'])->name('destination.index');
Route::get('/limbah', [LimbahController::class, 'index'])->name('limbah.index');
Route::get('/report', [ReportController::class, 'index'])->name('report.index');

