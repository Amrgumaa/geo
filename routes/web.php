<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeoipController;
use App\Http\Controllers\UserController;


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
    return view('welcome');
});

//Route::resource('geo', '\App\Http\Controllers\GeoipController');
 Route::get('/geo', [GeoipController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);
Route::post('/dashboard/timzone_update', [DashboardController::class, 'timezone_update'])->middleware(['auth'])->name('timezone.update');

// Route::get('/dashboard/t', [GeoipController::class, 'trackUserActivity'])->middleware(['auth'])->name('trackUser_Activity');










require __DIR__.'/auth.php';
