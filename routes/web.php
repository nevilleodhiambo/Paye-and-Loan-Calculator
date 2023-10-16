<?php

use App\Http\Controllers\HouseLevyController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\NhifreliefController;
use App\Http\Controllers\NssfController;
use App\Http\Controllers\PayeController;
use App\Http\Controllers\PersonalReliefController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RDBController;
use App\Http\Controllers\SalaryController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('nhifrelief', NhifreliefController::class);
Route::resource('nssf', NssfController::class);
Route::resource('levy', HouseLevyController::class);
Route::resource('salary', SalaryController::class);
Route::resource('paye', PayeController::class);
Route::resource('personal', PersonalReliefController::class);
Route::resource('loancalculator', LoanController::class);
Route::get('myrate', [SalaryController::class, 'searching'])->name('searching');
Route::post('searching',[SalaryController::class, 'search'])->name('search');

Route::post('myloan', [LoanController::class, 'calcloan'])->name('calc.loan');
Route::get('loaninput', [LoanController::class, 'enteramount'])->name('enter.amount');
Route::get('myloandisplay', [LoanController::class,'display'])->name('loan.display');
// Route::get('display', [SalaryController::class, 'sea'])

Route::post('calculator', [RDBController::class, 'calculator'])->name('rdb.calculator');
Route::get('myinput', [RDBController::class, 'input'])->name('rdb.input');
require __DIR__.'/auth.php';
