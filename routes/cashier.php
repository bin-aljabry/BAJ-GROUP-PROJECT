<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCateoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('cashier')->name('cashier.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[CashierController::class,'dashboard'])->name('cashier.dashboard');
    Route::middleware(['role:Cashier'])->group(function(){
        Route::resource('user',UserController::class);
        Route::resource('role',RoleController::class);
});
});
