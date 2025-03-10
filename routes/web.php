<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIInsightController;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\DashboardAdminController;





use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SettingController;
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



Route::middleware(['auth'])->group(function () {
    Route::get('/alerts', [AlertController::class, 'index'])->name('alerts.index');
    Route::post('/alerts', [AlertController::class, 'store'])->name('alerts.store');
    Route::delete('/alerts/{alert}', [AlertController::class, 'destroy'])->name('alerts.destroy');
});




// Route::middleware(['auth'])->group(function () {
//     // Route dashboard normal
//     Route::get('/dashboard', function () {
//         return view('pages.dashboard');
//     })->name('dashboard');
// });


// // Routes Admin
// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
//     Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard');
//     Route::get('users', [UserController::class, 'index'])->name('users.index');
//     Route::delete('users/inactive', [UserController::class, 'deleteInactive'])
//         ->name('users.delete-inactive');

//     // Gestion des catégories
//     Route::resource('categories', CategoryController::class);
// });


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard principal
    Route::get('/', [DashboardAdminController::class, 'index'])->name('dashboard');

    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    // ✅ Corrected resource route
    Route::resource('users', UserController::class)->names('users');

    // Gestion des catégories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Route de déconnexion
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});


require __DIR__.'/auth.php';
