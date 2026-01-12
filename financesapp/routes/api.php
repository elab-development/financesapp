<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/wallets', [WalletController::class, 'index']);
Route::get('/wallets/{id}', [WalletController::class, 'show']);
Route::post('/wallets', [WalletController::class, 'store']);
Route::delete('/wallets/{id}', [WalletController::class, 'destroy']);
Route::put('/wallets/{id}', [WalletController::class, 'update']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('categories/', [CategoryController::class, 'store']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);


Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('transactions/', [TransactionController::class, 'store']);
Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

Route::get('/transfers', [TransferController::class, 'index']);
Route::post('transfers/', [TransferController::class, 'store']);
Route::delete('/transfers/{id}', [TransferController::class, 'destroy']);
