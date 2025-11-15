<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ExpenseHeads;
use App\Models\Meal;
use App\Models\Payment;
use App\Models\Bazar;
use App\Models\MealRecords;
use App\Models\MemberAdvance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ManagerController extends Controller
{
    public function createMember(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'phone' => 'string|max:20',
            'room_no' => 'string|max:10',

        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'member';
        $validated['status'] = 'active';

        User::create($validated);
        return redirect()->back()->with('success', 'Member created successfully.');
    }

    public function members()
    {
        $members = User::paginate(7);

        return view('manager.members', [
            'members' => $members,
        ]);
    }

    public function role()
    {
        $members = User::whereIn('role', ['accountant', 'manager', 'operations'])->get();

        $membersCount = User::where('role', 'member')->count();
        $operationsCount = User::where('role', 'operations')->count();
        $accountantsCount = User::where('role', 'accountant')->count();
        $managersCount = User::where('role', 'manager')->count();

        $onlyMembers = User::where('role','member')->paginate(3);
        // Dropdown roles
        $roles = ['member', 'operations', 'accountant', 'manager'];

        return view('manager.role', compact(

            'members',
            'membersCount',
            'operationsCount',
            'accountantsCount',
            'managersCount',
            'onlyMembers'

            ));
    }

    public function updateRole(Request $request){

         $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'role' => [
            'required',
            function ($attribute, $value, $fail) {
                if (in_array($value, ['manager', 'accountant', 'operations'])) {
                    $exists = User::where('role', $value)->exists();
                    if ($exists) {
                        $fail("Only one $value is allowed in the system.");
                    }
                }
            }
        ],
    ]);

        $user = User::findOrFail($validated['user_id']);
        $user->role = $validated['role'];
        $user->save();

        return redirect()->back()->with('success', 'Member updated successfully.');

    }



    public function accounts()
    {
        return view('manager.accounts');
    }
    public function reports()
    {
         $currentMonth = now()->month;
    $currentYear  = now()->year;

    // All active users (members, accountant, operations)
    $users = User::whereIn('role', ['member', 'accountant', 'operations'])
                ->where('status', 'active')
                ->get();

    $totalMembers = $users->count();

    // ====== TOTAL MEALS OF ALL MEMBERS ======
    $totalMealsAllMembers = MealRecords::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->get()
        ->sum(function ($meal) {
            return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
        });

    // ====== BAZAR TOTAL ======
    $bazarBill = Bazar::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->sum('amount');

    // ====== UTILITY BILLS ======
    $allBills = ExpenseHeads::whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->get()
        ->groupBy('head');

    $utilityPerHead = 0;

    foreach ($allBills as $items) {
        $utilityPerHead += $items->sum('amount') / $totalMembers;
    }

    // ===== FINAL DUE LIST =====
    $dueList = [];

    foreach ($users as $user) {

        // USER TOTAL MEAL
        $userMeals = MealRecords::where('user_id', $user->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->get()
            ->sum(function ($meal) {
                return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
            });

        // BAZAR SHARE BASED ON MEAL RATIO
        $bazarBillPerHead = 0;

        if ($totalMealsAllMembers > 0) {
            $bazarBillPerHead = ($bazarBill / $totalMealsAllMembers) * $userMeals;
        }

        // Total bill for this user
        $totalDue = $utilityPerHead + $bazarBillPerHead;

        // User advance
        $advance = MemberAdvance::where('user_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('advance');

        $payable = $totalDue - $advance;

        //user payment
        $payments = Payment::where('user_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('amount');

            $paid = $payments;

            $balance = ($totalDue - $advance) - $paid;
            //dd($paid);

        // ADD USER DATA TO LIST
        $reports[] = [
            'name' => $user->name,
            'meal' => $userMeals,
            'role' => ucfirst($user->role),
            'bazarShare' => round($bazarBillPerHead, 2),
            'utility' => round($utilityPerHead, 2),
            'totalDue' => round($totalDue, 2),
            'advance' => $advance,
            'payable' => round($payable, 2),
            'paid' => round($paid, 2),
            'balance' => round($balance, 2),
        ];
    }
        return view('manager.reports',[
        'reports' => $reports,
        'users' => $users,
    ]);    

    }

    public function profile()
    {   $users = Auth::user();
        return view('manager.profile', compact('users'));
    }

    public function overview()
    {
        //total members
        $totalMembers = User::whereIn('role', ['member', 'operations', 'accountant'])
                    ->where('status', 'active')
                    ->count();


        //total meals today
        $totalMealsToday = MealRecords::whereDate('date', Carbon::today())
            ->get()
            ->sum(function($meal) {
                return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
            });
        //total payments 
        
        $totalAdvance  = MemberAdvance::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->sum('advance');
        //payments this month
        $paymentsThisMonth = Payment::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->sum('amount');
        $totalPayments = $totalAdvance + $paymentsThisMonth;       
        
        //total bazar
        $totalBazar = Bazar::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->sum('amount');
        //total utility
        $totalUtility = ExpenseHeads::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)      
                                ->sum('amount');

        //total dues    
        $totalDues = ($totalBazar + $totalUtility) - $totalPayments;


        return view('manager.overview', 
        compact('totalMembers', 'totalMealsToday', 'totalPayments', 'totalDues')
    );
    }
    public function expenses()
    {
        $expenseHeads = ExpenseHeads::paginate(7);
        
        return view('manager.expenses',[
            
            'expenseHeads' =>  $expenseHeads
            ]);
    }
    
    public function storeExpense(Request $request){
        
        $validated = $request->validate([
        'head' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'amount' => 'required|numeric|min:0',
        'active' => 'sometimes|boolean', 
        
       
        ]);
        
         ExpenseHeads::create($validated);
         
         return redirect()->back()->with('success', 'Expense created successfully');
        
    }

    public function search()
    {
                 $currentMonth = now()->month;
    $currentYear  = now()->year;

    // All active users (members, accountant, operations)
    $users = User::whereIn('role', ['member', 'accountant', 'operations'])
                ->where('status', 'active')
                ->get();

    $totalMembers = $users->count();

    // ====== TOTAL MEALS OF ALL MEMBERS ======
    $totalMealsAllMembers = MealRecords::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->get()
        ->sum(function ($meal) {
            return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
        });

    // ====== BAZAR TOTAL ======
    $bazarBill = Bazar::whereMonth('date', $currentMonth)
        ->whereYear('date', $currentYear)
        ->sum('amount');

    // ====== UTILITY BILLS ======
    $allBills = ExpenseHeads::whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->get()
        ->groupBy('head');

    $utilityPerHead = 0;

    foreach ($allBills as $items) {
        $utilityPerHead += $items->sum('amount') / $totalMembers;
    }

    // ===== FINAL DUE LIST =====
    $dueList = [];

    foreach ($users as $user) {

        // USER TOTAL MEAL
        $userMeals = MealRecords::where('user_id', $user->id)
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->get()
            ->sum(function ($meal) {
                return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
            });

        // BAZAR SHARE BASED ON MEAL RATIO
        $bazarBillPerHead = 0;

        if ($totalMealsAllMembers > 0) {
            $bazarBillPerHead = ($bazarBill / $totalMealsAllMembers) * $userMeals;
        }

        // Total bill for this user
        $totalDue = $utilityPerHead + $bazarBillPerHead;

        // User advance
        $advance = MemberAdvance::where('user_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('advance');

        $payable = $totalDue - $advance;

        //user payment
        $payments = Payment::where('user_id', $user->id)
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('amount');

            $paid = $payments;

            $balance = ($totalDue - $advance) - $paid;
            //dd($paid);

        // ADD USER DATA TO LIST
        $reports[] = [
            'name' => $user->name,
            'meal' => $userMeals,
            'role' => ucfirst($user->role),
            'bazarShare' => round($bazarBillPerHead, 2),
            'utility' => round($utilityPerHead, 2),
            'totalDue' => round($totalDue, 2),
            'advance' => $advance,
            'payable' => round($payable, 2),
            'paid' => round($paid, 2),
            'balance' => round($balance, 2),
        ];
    }
        return view('manager.search',[
        'reports' => $reports,
        'users' => $users,
    ]); 
        
    }
}
