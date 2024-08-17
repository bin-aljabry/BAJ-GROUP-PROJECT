<?php

use App\Http\Controllers\AgentBranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCateoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AgentBranchTellerController;
use App\Http\Controllers\TellerTillController;
use App\Http\Controllers\TillTransactionController;




Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['role:admin'])->group(function(){
        Route::resource('company',CompanyController::class);
        Route::resource('user',UserController::class);
        Route::resource('role',RoleController::class)->except('show');
        Route::resource('permission',PermissionController::class);
        Route::resource('category',CategoryController::class);
        Route::resource('subcategory',SubCateoryController::class);
        Route::resource('collection',CollectionController::class);
        Route::resource('product',ProductController::class);
        Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');
        Route::get('/role/dashboard', [RoleController::class,'index'])->name('role.index');
        Route::get('/role/', [RoleController::class,'addPermissionToRole'])->name('role.add-permission');
        Route::put('/role/given-permission', [RoleController::class,'addPermissionToRole'])->name('role.give_add-permission');


    });

});

Route::prefix('cashier')->name('cashier.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/cashier/dashboard',[CashierController::class,'dashboard'])->name('cashier.dashboard');

    Route::middleware(['role:Cashier'])->group(function(){
        Route::resource('expenses',ExpenseController::class);
        Route::resource('role',RoleController::class);
        Route::resource('branch',AgentBranchController::class);
        Route::resource('teller',AgentBranchTellerController::class);
        Route::resource('till',TellerTillController::class);
        Route::resource('deposit',TillTransactionController::class);

        Route::resource('subcategory',SubCateoryController::class);
        Route::resource('collection',CollectionController::class);
        Route::resource('product',ProductController::class);

        Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');
    });


});
