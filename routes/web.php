<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transactions');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transactions');
Route::get('/notifications', [NotificationController::class, 'index'])->middleware(['auth'])->name('notifications');
Route::get('/goals', [GoalController::class, 'index'])->middleware(['auth'])->name('goals');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


use App\Http\Controllers\SalaryController;

Route::post('/dashboard/update', [SalaryController::class, 'updateSalary'])->name('salary.update');

// Route::get('dashboard', [DashboardController::class, 'editSalary'])->name('salary.edit');

require __DIR__.'/auth.php';