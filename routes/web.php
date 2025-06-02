<?php

use App\Http\Controllers\invoiceRegisterController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\mainPageController;
use App\Http\Controllers\printInvoiceController;
use App\Http\Controllers\userRegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", [loginController::class, 'index'])->name("loginPage");
Route::post("/", [loginController::class, 'store']);


Route::get("/Register", [userRegisterController::class, 'index'])->name("userRegister");
Route::post("/Register", [userRegisterController::class, 'store']);

Route::get('/Main', [mainPageController::class, 'index'])->name('mainPage')->middleware('auth');

Route::get('/invoiceRegister', [invoiceRegisterController::class, 'index'])->name('invoiceRegister')->middleware('auth');
Route::post('/invoiceRegister', [invoiceRegisterController::class, 'store'])->middleware('auth');

Route::post('/printInvoice', [printInvoiceController::class, 'index'])->name('printInvoice')->middleware('auth');

Route::get('/Logout', [logoutController::class, 'store'])->name('logout');