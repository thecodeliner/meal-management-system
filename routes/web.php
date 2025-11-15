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
->middleware('guest')->name('showLogin');

Route::post('/login', [AuthController::class, 'login'])
->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Accountant Routes

// Accountant Overview
Route::get('/accountant/overview', [AccountantController::class, 'overview'])
->middleware('isAccountant') ->name('accountant.overview');

// Receive Payments
Route::get('/accountant/payments', [AccountantController::class, 'payments'])
->middleware('isAccountant')->name('accountant.payments');

// Financial Reports
Route::get('/accountant/financial', [AccountantController::class, 'financial'])
->middleware('isAccountant')->name('accountant.financial');

// Profile Settings
Route::get('/accountant/profile', [AccountantController::class, 'profile'])
->middleware('isAccountant')->name('accountant.profile');

Route::get('/accountant/due-payments', [AccountantController::class, 'dues'])
->middleware('isAccountant')->name('accountant.dues');

Route::post('/accountant/receive-payment', [AccountantController::class, 'receivePayment'])
->middleware('isAccountant')->name('accountant.receivePayment');


// Manager Routes

Route::post('/manager/create-member', [ManagerController::class, 'createMember'])
->middleware('isManager')
->name('manager.members.store');

Route::get('/manager/role', [ManagerController::class, 'role'])
->middleware('isManager')
->name('manager.role');

Route::post('/manager/update-role', [ManagerController::class, 'updateRole'])
->middleware('isManager')
->name('manager.updateRole');
//

Route::get('/manager/members', [ManagerController::class, 'members'])
->middleware('isManager')
->name('manager.members');

Route::get('/manager/accounts', [ManagerController::class, 'accounts'])
->middleware('isManager')
->name('manager.accounts');

Route::get('/manager/reports', [ManagerController::class, 'reports'])
->middleware('isManager')
->name('manager.reports');

Route::get('/manager/profile', [ManagerController::class, 'profile'])
->middleware('isManager')
->name('manager.profile');

Route::get('/manager/overview', [ManagerController::class, 'overview'])
->middleware('isManager')
->name('manager.overview');

Route::get('/manager/expenses', [ManagerController::class, 'expenses'])
->middleware('isManager')
->name('manager.expenses');

Route::post('/manager/expense-head', [ManagerController::class, 'storeExpense'])
->middleware('isManager')
->name('manager.storeExpense');


Route::get('/manager/search', [ManagerController::class, 'search'])
->middleware('isManager')
->name('manager.search');

// Meal Rate Route
Route::get('/manager/meal', [MealRateController::class, 'mealRate'])
->middleware('isManager')
->name('manager.mealRate');

Route::post('/manager/meal-rate', [MealRateController::class, 'storeRate'])
->middleware('isManager')
->name('manager.storeRate');

// Member Routes

Route::get('/member/overview', [MemberController::class, 'overview'])
->middleware('isMember')
->name('member.overview');

Route::get('/member/meals', [MemberController::class, 'meals'])
->middleware('isMember')
->name('member.meals');

// Meal Record Submission
Route::post('/member/record', [MemberController::class, 'mealRecord'])
->middleware('isMember')
->name('member.record');

Route::post('/member/advance', [MemberController::class, 'mealAdvance'])
->middleware('isMember')
->name('meal.advance');


// Bills Route
Route::get('/member/bills', [monthlyBillController::class, 'monthlyBill'])
->middleware('isMember')
->name('member.bills');

Route::get('/member/profile', [MemberController::class, 'profile'])
->middleware('isMember')
->name('member.profile');

Route::get('/member/history', [MemberController::class, 'history'])
->middleware('isMember')
->name('member.history');

// Operation Routes
Route::get('/operation/overview', [OperationController::class, 'overview'])
->middleware('isOperations')
->name('operation.overview');

Route::post('/operation/bazar-entry', [OperationController::class, 'bazarEntry'])
->middleware('isOperations')
->name('operation.bazarEntry');

Route::get('/operation/bazars', [OperationController::class, 'bazars'])
->middleware('isOperations')
->name('operation.bazars');

Route::get('/operation/costing', [OperationController::class, 'costing'])
->middleware('isOperations')
->name('operation.costing');

Route::get('/operation/profile', [OperationController::class, 'profile'])
->middleware('isOperations')
->name('operation.profile');
