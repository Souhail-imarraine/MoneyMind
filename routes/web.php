<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIInsightController;


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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transactions');
Route::get('/notifications', [NotificationController::class, 'index'])->middleware(['auth'])->name('notifications');
Route::get('/goals', [GoalController::class, 'index'])->middleware(['auth'])->name('goals');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::put('/dashboard/{id}/update-salary', [SalaryController::class, 'updateSalary'])->name('dashboard.updateSalary');

// Route::get('dashboard', [DashboardController::class, 'editSalary'])->name('salary.edit');


Route::get('/transactions', [TransactionController::class, 'index'])->middleware(['auth'])->name('transactions');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');  // Make sure this route exists for POST



Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');


Route::post('/goals', [GoalController::class, 'store'])->name('goals.store');
Route::delete('/goals/{id}', [GoalController::class, 'destroy'])->name('goals.destroy');
Route::post('/goals/{id}/progress', [GoalController::class, 'updateProgress'])->name('goals.progress');




require __DIR__.'/auth.php';
