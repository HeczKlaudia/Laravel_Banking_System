<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\SzamlakController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/myAccount', function () {
        return view('myAccount');
    });

    Route::get('/deposit', function () {
        return view('deposit');
    });

    Route::get('/withdraw', function () {
        return view('withdraw');
    });

    Route::get('/transfer', function () {
        return view('transfer');
    });
});

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

Route::get('/dashboard', [SzamlakController::class, 'index']);
Route::get('/myAccount', [AccountController::class, 'index']);

Route::post('/uj_szamla', [AccountController::class, 'ujSzamla'])->name('uj_szamla');



Route::get('transfer/{id}', [TransferController::class, 'transfer'])->name('transfer');
Route::POST('final-process/{id}', [TransferController::class, 'final_process'])->name('final_process');
Route::POST('submitted/{id}/{idd}/{remaining}/{transfer}/{uzenet}', [TransferController::class, 'submitted'])->name('submitted');

Route::post('/deposit-amount', [DepositController::class, 'newDeposit'])->name('deposit-amount');
Route::post('/withdraw-amount', [WithdrawController::class, 'newWithdraw'])->name('withdraw-amount');

/* ADMIN */
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('deposit', [DepositController::class, 'deposit'])->name('deposit');
    Route::get('withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw');
    Route::get('/adminFelhasznalok', [AdminController::class, 'index']);
    Route::post('/uj_felhasznalo', [AdminController::class, 'ujFelhasznalo'])->name('uj_felhasznalo');
    Route::get('/transactions', [DepositController::class, 'transactions'])->name('my_transactions');
    Route::get('/transactions', [WithdrawController::class, 'transactions'])->name('my_transactions');
});