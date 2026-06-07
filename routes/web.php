<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseController;              // ✅ এই দুইটা add করতে হবে
use App\Http\Controllers\ExpenseCategoryController;      // ✅ না থাকলে error দেবে

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
require __DIR__.'/auth.php';

// All dashboard routes protected by auth middleware
Route::middleware(['auth'])->group(function () {

    // Admin dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

   //Route::post('/dashboard/income/category/update/{slug}', [IncomeCategoryController::class, 'update'])->name('income.category.update');



    // User controller routes
    Route::prefix('dashboard/user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/add', [UserController::class, 'add']);
        Route::post('/submit', [UserController::class, 'insert']);
        Route::get('/edit', [UserController::class, 'edit']);
        Route::get('/view', [UserController::class, 'view']);
        Route::post('/update', [UserController::class, 'update']);
        Route::get('/softdelete', [UserController::class, 'softdelete']);
        Route::get('/restore', [UserController::class, 'restore']);
        Route::get('/delete', [UserController::class, 'delete']);
    });

    // Income routes
    Route::prefix('dashboard/income')->group(function () {
        Route::get('/', [IncomeController::class, 'index']);
        Route::get('/add', [IncomeController::class, 'add']);
        Route::post('/submit', [IncomeController::class, 'insert']);
        Route::get('/edit', [IncomeController::class, 'edit']);
        Route::get('/view', [IncomeController::class, 'view']);
        Route::post('/update', [IncomeController::class, 'update']);
        Route::get('/softdelete', [IncomeController::class, 'softdelete']);
        Route::get('/restore', [IncomeController::class, 'restore']);
        Route::get('/delete', [IncomeController::class, 'delete']);
    });

    // Income Category controller routes
   

    Route::prefix('dashboard/income/category')->group(function () {
    Route::get('/', [IncomeCategoryController::class, 'index']);
    Route::get('/add', [IncomeCategoryController::class, 'add']);
    Route::post('/submit', [IncomeCategoryController::class, 'insert']);

    // Edit & Update
    Route::get('/edit/{slug}', [IncomeCategoryController::class, 'edit']);
    Route::post('/update/{id}', [IncomeCategoryController::class, 'update']);

    Route::get('/view/{slug}', [IncomeCategoryController::class, 'view']);

    // Soft delete, restore, delete
    // Route::get('/softdelete', [IncomeCategoryController::class, 'softdelete']);
    // Route::get('/restore', [IncomeCategoryController::class, 'restore']);
    // Route::get('/delete', [IncomeCategoryController::class, 'delete']);
    Route::get('/softdelete/{id}', [IncomeCategoryController::class, 'softdelete']);
    Route::get('/restore/{id}', [IncomeCategoryController::class, 'restore']);
    Route::get('/delete/{id}', [IncomeCategoryController::class, 'delete']);
    });


    // =====================================
    // 🔷 Expense Routes
    // =====================================
    Route::prefix('dashboard/expense')->group(function () {
        Route::get('/', [ExpenseController::class, 'index'])->name('expense.index');
        Route::get('/add', [ExpenseController::class, 'add'])->name('expense.add');
        Route::post('/submit', [ExpenseController::class, 'insert'])->name('expense.insert');
        Route::get('/edit/{id}', [ExpenseController::class, 'edit'])->name('expense.edit');
        Route::get('/view/{id}', [ExpenseController::class, 'view'])->name('expense.view');
        Route::post('/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
        Route::get('/softdelete/{id}', [ExpenseController::class, 'softdelete'])->name('expense.softdelete');
        Route::get('/restore/{id}', [ExpenseController::class, 'restore'])->name('expense.restore');
        Route::get('/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');
    });


    // =====================================
    // 🔷 Expense Category Routes
    // =====================================
    Route::prefix('dashboard/expense/category')->group(function () {
        Route::get('/', [ExpenseCategoryController::class, 'index'])->name('expense.category.index');
        Route::get('/add', [ExpenseCategoryController::class, 'add'])->name('expense.category.add');
        Route::post('/submit', [ExpenseCategoryController::class, 'insert'])->name('expense.category.insert');
        Route::get('/edit/{id}', [ExpenseCategoryController::class, 'edit'])->name('expense.category.edit');
        Route::get('/view/{id}', [ExpenseCategoryController::class, 'view'])->name('expense.category.view');
        Route::post('/update/{id}', [ExpenseCategoryController::class, 'update'])->name('expense.category.update');
        Route::get('/softdelete/{id}', [ExpenseCategoryController::class, 'softdelete'])->name('expense.category.softdelete');
        Route::get('/restore/{id}', [ExpenseCategoryController::class, 'restore'])->name('expense.category.restore');
        Route::get('/delete/{id}', [ExpenseCategoryController::class, 'delete'])->name('expense.category.delete');
    });



});
