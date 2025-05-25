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
use App\Http\Controllers\TellerCapitalController;
use App\Http\Controllers\TellerTillController;
use App\Http\Controllers\TillTransactionController;
use App\Http\Controllers\TillDepositTransactionController;
use App\Http\Controllers\TillWithdrawTransactionController;
use App\Http\Controllers\TillFloatController;
use App\Http\Controllers\ExpensesCategoryController;
use App\Http\Controllers\TellerIncomeController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\TellerBallanceController;
use App\Http\Controllers\TellerCashController;
use App\Http\Controllers\TellerFloatTransferController;
use App\Models\till_withdraw_transaction;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\PaymentsController;



Route::middleware(['auth', 'role:Super Admin'])->prefix('superadmin')->name('superadmin.')->group(function () {
  Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/companies', [SuperAdminController::class, 'index'])->name('companies.index');
    Route::get('/admins', [SuperAdminController::class, 'viewAdmins'])->name('admins.index');
    Route::get('/admin/{id}', [SuperAdminController::class, 'viewAdminDetails'])->name('admin.show');
    Route::patch('/company/{id}/payment-status', [SuperAdminController::class, 'updatePaymentStatus'])->name('company.payment-status');
    Route::patch('/company/{id}/user-limit', [SuperAdminController::class, 'setUserLimit'])->name('company.user-limit');
    Route::get('/notifications', [SuperAdminController::class, 'notifications'])->name('notifications');
    Route::get('/payments', [SuperAdminController::class, 'payments'])->name('payments');
    Route::get('/packages', [SuperAdminController::class, 'packages'])->name('packages');
    Route::get('/reports/customers', [SuperAdminController::class, 'reportCustomers'])->name('reports.customers');
    Route::get('/reports/payments', [SuperAdminController::class, 'reportPayments'])->name('reports.payments');

});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['role:admin'])->group(function(){

        Route::post('store-branch', [CompanyController::class, 'assignBranch'])->name('branch.store');
        Route::get('create-branch', [CompanyController::class, 'createbranch'])->name('branch.create');
        Route::get('list-branch', [CompanyController::class, 'branchlist'])->name('branch.list');
        Route::put('/admin/branches/update/{id}', [CompanyController::class, 'branchupdate'])->name('branch.update');
        Route::delete('/admin/branches/destroy/{id}', [CompanyController::class, 'branchdestroy'])->name('branch.destroy');
        Route::get('/admin/branches/edit/{id}', [CompanyController::class, 'branchedit'])->name('branch.edit');

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

        Route::resource('capital',TellerCapitalController::class);
        Route::resource('expenses',ExpenseController::class);
        Route::resource('expenses_category',ExpensesCategoryController::class);
        Route::resource('income',TellerIncomeController::class);
        Route::resource('income_category',IncomeCategoryController::class);
        Route::resource('role',RoleController::class);
        Route::resource('branch',AgentBranchController::class);
        Route::resource('teller',AgentBranchTellerController::class);
        Route::resource('till',TellerTillController::class);
        Route::resource('deposit',TillDepositTransactionController::class);
        Route::resource('withdraw',TillWithdrawTransactionController::class);
        Route::resource('float',TillFloatController::class);
        Route::resource('cash',TellerCashController::class);
        Route::resource('transfer',TellerFloatTransferController::class);
        Route::resource('balance',TellerBallanceController::class);



        Route::resource('subcategory',SubCateoryController::class);
        Route::resource('collection',CollectionController::class);
        Route::resource('product',ProductController::class);


        Route::get('/company/profile/home',[CompanyController::class,'Cashierindex'])->name('company.index');
        Route::get('/company/create/',[CompanyController::class,'Cashiercreate'])->name('company.create');
        Route::post('/company/profile/store',[CompanyController::class,'Cashierstore'])->name('company.store');
        Route::get('/company/{id}/edit',[CompanyController::class,'Cashieredit'])->name('company.edit');
        Route::put('/company/update',[CompanyController::class,'Cashierupdate'])->name('company.update');
        Route::get('/company/delete',[CompanyController::class,'Cashierdestroy'])->name('company.destroy');

        Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');
    });


});

Route::prefix('teller')->name('teller.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/teller/dashboard',[CashierController::class,'dashboard'])->name('cashier.dashboard');

    Route::middleware(['role:Teller'])->group(function(){

        Route::resource('capital',TellerCapitalController::class);
        Route::resource('expenses',ExpenseController::class);
        Route::resource('expenses_category',ExpensesCategoryController::class);
        Route::resource('income',TellerIncomeController::class);
        Route::resource('income_category',IncomeCategoryController::class);
        Route::resource('role',RoleController::class);
        Route::resource('branch',AgentBranchController::class);
        Route::resource('teller',AgentBranchTellerController::class);
        Route::resource('till',TellerTillController::class);
        Route::resource('deposit',TillDepositTransactionController::class);
        Route::resource('withdraw',TillWithdrawTransactionController::class);
        Route::resource('float',TillFloatController::class);
        Route::resource('cash',TellerCashController::class);
        Route::resource('transfer',TellerFloatTransferController::class);
        Route::resource('balance',TellerBallanceController::class);



        Route::resource('subcategory',SubCateoryController::class);
        Route::resource('collection',CollectionController::class);
        Route::resource('product',ProductController::class);


        Route::get('/company/profile/home',[CompanyController::class,'Cashierindex'])->name('company.index');
        Route::get('/company/create/',[CompanyController::class,'Cashiercreate'])->name('company.create');
        Route::post('/company/profile/store',[CompanyController::class,'Cashierstore'])->name('company.store');
        Route::get('/company/{id}/edit',[CompanyController::class,'Cashieredit'])->name('company.edit');
        Route::put('/company/update',[CompanyController::class,'Cashierupdate'])->name('company.update');
        Route::get('/company/delete',[CompanyController::class,'Cashierdestroy'])->name('company.destroy');

        Route::get('/get/subcategory',[ProductController::class,'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}',[ProductController::class,'removeImage'])->name('remove.image');
    });


});
