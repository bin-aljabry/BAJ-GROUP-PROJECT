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
use App\Http\Controllers\TillsController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BranchCapitalController;



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


 // Branch Capitals routes
    Route::get('capital/branch', [BranchCapitalController::class, 'branchIndex'])->name('capital.branch.index');
    Route::get('capital/branch/create', [BranchCapitalController::class, 'branchCreate'])->name('capital.branch.create');
    Route::post('capital/branch', [BranchCapitalController::class, 'branchStore'])->name('capital.branch.store');
    Route::get('capital/branch/{id}/edit', [BranchCapitalController::class, 'branchEdit'])->name('capital.branch.edit');
    Route::put('capital/branch/{id}', [BranchCapitalController::class, 'branchUpdate'])->name('capital.branch.update');
    Route::delete('capital/branch/{id}', [BranchCapitalController::class, 'branchDestroy'])->name('capital.branch.destroy');

    
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
        Route::get('/role/{id}', [RoleController::class,'addPermissionToRole'])->name('role.add-permission');
        Route::put('/role/given-permission', [RoleController::class,'addPermissionToRole'])->name('role.give_add-permission');


    });

});

Route::prefix('cashier')->name('cashier.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/cashier/dashboard',[CashierController::class,'dashboard'])->name('cashier.dashboard');

    Route::middleware(['role:Manager'])->group(function(){



            Route::get('/manager/list/teller', [AgentBranchTellerController::class, 'tellerlist'])->name('teller.list');
            Route::get('/manager/create/teller', [AgentBranchTellerController::class, 'tellercreate'])->name('teller.create');
             Route::get('/manager/teller/edit/{id}', [AgentBranchTellerController::class, 'telleredit'])->name('teller.edit');
              Route::post('/manager/teller/store', [AgentBranchTellerController::class, 'tellerstore'])->name('teller.store');
        Route::put('/manager/teller/update/{id}', [AgentBranchTellerController::class, 'update'])->name('teller.update');
        Route::delete('/manager/teller/destroy/{id}', [AgentBranchTellerController::class, 'destroy'])->name('teller.destroy');


        Route::get('/manager/till/list', [TillsController::class, 'tillList'])->name('till.list');
        Route::get('/manager/till/create', [TillsController::class, 'create'])->name('till.create');
        Route::POST('/manager/till/store', [TillsController::class, 'store'])->name('till.store');
        Route::get('/manager/till/update/{id}', [TillsController::class, 'edit'])->name('till.edit');
        Route::delete('/manager/till/destroy/{id}', [TillsController::class, 'destroy'])->name('till.destroy');
        Route::put('/manager/till/update/{id}', [TillsController::class, 'update'])->name('till.update');

        Route::get('/manager/bank-accounts/list', [BankAccountController::class, 'index'])->name('bank-accounts.index');
        Route::get('/manager/bank-accounts/create', [BankAccountController::class, 'create'])->name('bank-accounts.create');
        Route::POST('/manager/bank-accounts/store', [BankAccountController::class, 'store'])->name('bank-accounts.store');
        Route::get('/manager/bank-accounts/update/{id}', [BankAccountController::class, 'edit'])->name('bank-accounts.edit');
        Route::delete('/manager/bank-accounts/destroy/{id}', [BankAccountController::class, 'destroy'])->name('bank-accounts.destroy');
        Route::put('/manager/bank-accounts/update/{id}', [BankAccountController::class, 'update'])->name('bank-accounts.update');

        //sub menu za capital
                    // Branch approval Capital
Route::get('cashier/branch-capital', [BranchCapitalController::class, 'managerCapitalList'])->name('capital.branch.index');
 Route::get('/branch/capital/{id}', [BranchCapitalController::class, 'managerShow'])->name('capital.branch.show');
    Route::post('{id}/approve', [BranchCapitalController::class, 'branchApprove'])->name('capital.branch.approve');
    Route::post('{id}/reject', [BranchCapitalController::class, 'branchReject'])->name('capital.branch.reject');


            // Teller Capital

    Route::get('/capital/teller', [BranchCapitalController::class, 'tellerIndex'])->name('capital.teller.index');
    Route::get('/teller/create', [BranchCapitalController::class, 'tellerCreate'])->name('capital.teller.create');
    Route::post('/tel/capital/taller', [BranchCapitalController::class, 'tellerStore'])->name('capital.teller.store');
    Route::get('/teller/{id}/edit', [BranchCapitalController::class, 'tellerEdit'])->name('capital.teller.edit');
    Route::put('/teller/{id}', [BranchCapitalController::class, 'tellerUpdate'])->name('capital.teller.update');
    Route::get('/capital/teller/{id}', [BranchCapitalController::class, 'tellerShow'])->name('capital.teller.show');
Route::get('/cashier/capital/teller/{id}/download', [TellerCapitalController::class, 'downloadPdf'])
    ->name('capital.teller.download');


    // Till Capital
  Route::get('/capital/till', [BranchCapitalController::class, 'tillIndex'])->name('capital.till.index');
    Route::get('/capital/till/create', [BranchCapitalController::class, 'tillCreate'])->name('capital.till.create');
    Route::post('/capital/till/store', [BranchCapitalController::class, 'tillStore'])->name('capital.till.store');
    Route::get('/capital/till/{id}/edit', [BranchCapitalController::class, 'tillEdit'])->name('capital.till.edit');
    Route::put('/capital/till/{id}/update', [BranchCapitalController::class, 'tillUpdate'])->name('capital.till.update');
    Route::get('/capital/till/{id}', [BranchCapitalController::class, 'tillShow'])->name('capital.till.show');
// Route za kupata capitals za teller
Route::get('/cashier/capital/till/get-tills/{tellerId}', [BranchCapitalController::class, 'getTills']);



    // Bank Capital
   Route::get('/capital/bank', [BranchCapitalController::class, 'bankIndex'])->name('capital.bank.index');
    Route::get('/capital/bank/create', [BranchCapitalController::class, 'bankCreate'])->name('capital.bank.create');
    Route::post('/capital/bank/store', [BranchCapitalController::class, 'bankStore'])->name('capital.bank.store');
    Route::get('/capital/bank/{id}/edit', [BranchCapitalController::class, 'bankEdit'])->name('capital.bank.edit');
    Route::put('/capital/bank/{id}/update', [BranchCapitalController::class, 'bankUpdate'])->name('capital.bank.update');
    Route::get('/capital/bank/{id}', [BranchCapitalController::class, 'bankShow'])->name('capital.bank.show');
    Route::delete('/capital/bank/{id}', [BranchCapitalController::class, 'bankDestroy'])->name('capital.bank.destroy');


    // Cash Issued
    Route::get('/capital/cash', [BranchCapitalController::class, 'cashIndex'])->name('capital.cash.index');
    Route::get('/capital/cash/create', [BranchCapitalController::class, 'cashCreate'])->name('capital.cash.create');
    Route::post('/capital/cash/store', [BranchCapitalController::class, 'cashStore'])->name('capital.cash.store');
    Route::get('/capital/cash/{id}/edit', [BranchCapitalController::class, 'cashEdit'])->name('capital.cash.edit');
    Route::put('/capital/cash/{id}', [BranchCapitalController::class, 'cashUpdate'])->name('capital.cash.update');
    Route::get('/capital/cash/{id}', [BranchCapitalController::class, 'cashShow'])->name('capital.cash.show');


        Route::resource('capital',TellerCapitalController::class);
        Route::resource('expenses',ExpenseController::class);
        Route::resource('expenses_category',ExpensesCategoryController::class);
        Route::resource('income',TellerIncomeController::class);
        Route::resource('income_category',IncomeCategoryController::class);
        Route::resource('role',RoleController::class);
        Route::resource('branch',AgentBranchController::class);
        Route::resource('till_code', TillsController::class);
        Route::resource('deposit',TillDepositTransactionController::class);
        Route::resource('withdraw',TillWithdrawTransactionController::class);
        Route::resource('float',TillFloatController::class);
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
