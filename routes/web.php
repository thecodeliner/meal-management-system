<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealRateController;
use App\Http\Controllers\MealRecordsController;
use App\Http\Controllers\monthlyBillController;



//Auth Routes
Route::get('/', [AuthController::class, 'showLogin'])
->name('showLogin');

Route::post('/login', [AuthController::class, 'login'])
->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Accountant Routes

// Accountant Overview
Route::get('/accountant/overview', [AccountantController::class, 'overview'])
->name('accountant.overview');

// Receive Payments
Route::get('/accountant/payments', [AccountantController::class, 'payments'])
->name('accountant.payments');

// Financial Reports
Route::get('/accountant/financial', [AccountantController::class, 'financial'])
->name('accountant.financial');

// Profile Settings
Route::get('/accountant/profile', [AccountantController::class, 'profile'])
->name('accountant.profile');

Route::get('/accountant/due-payments', [AccountantController::class, 'dues'])
->name('accountant.dues');

Route::post('/accountant/receive-payment', [AccountantController::class, 'receivePayment'])
->name('accountant.receivePayment');


// Manager Routes

Route::post('/manager/create-member', [ManagerController::class, 'createMember'])
->name('manager.members.store');

Route::get('/manager/role', [ManagerController::class, 'role'])
->name('manager.role');

Route::post('/manager/update-role', [ManagerController::class, 'updateRole'])
->name('manager.updateRole');
//

Route::get('/manager/members', [ManagerController::class, 'members'])
->name('manager.members');

Route::get('/manager/accounts', [ManagerController::class, 'accounts'])
->name('manager.accounts');

Route::get('/manager/reports', [ManagerController::class, 'reports'])
->name('manager.reports');

Route::get('/manager/profile', [ManagerController::class, 'profile'])
->name('manager.profile');

Route::get('/manager/overview', [ManagerController::class, 'overview'])
->name('manager.overview');

Route::get('/manager/expenses', [ManagerController::class, 'expenses'])
->name('manager.expenses');

Route::post('/manager/expense-head', [ManagerController::class, 'storeExpense'])
->name('manager.storeExpense');


Route::get('/manager/search', [ManagerController::class, 'search'])
->name('manager.search');

// Meal Rate Route
Route::get('/manager/meal', [MealRateController::class, 'mealRate'])
->name('manager.mealRate');

Route::post('/manager/meal-rate', [MealRateController::class, 'storeRate'])
->name('manager.storeRate');

// Member Routes

Route::get('/member/overview', [MemberController::class, 'overview'])
->name('member.overview');

Route::get('/member/meals', [MemberController::class, 'meals'])
->name('member.meals');

// Meal Record Submission
Route::post('/member/record', [MemberController::class, 'mealRecord'])
->name('member.record');

Route::post('/member/advance', [MemberController::class, 'mealAdvance'])
->name('meal.advance');


// Bills Route
Route::get('/member/bills', [monthlyBillController::class, 'monthlyBill'])
->name('member.bills');

Route::get('/member/profile', [MemberController::class, 'profile'])
->name('member.profile');

Route::get('/member/history', [MemberController::class, 'history'])
->name('member.history');

// Operation Routes
Route::get('/operation/overview', [OperationController::class, 'overview'])
->name('operation.overview');

Route::post('/operation/bazar-entry', [OperationController::class, 'bazarEntry'])
->name('operation.bazarEntry');

Route::get('/operation/bazars', [OperationController::class, 'bazars'])
->name('operation.bazars');

Route::get('/operation/costing', [OperationController::class, 'costing'])
->name('operation.costing');

Route::get('/operation/profile', [OperationController::class, 'profile'])
->name('operation.profile');
