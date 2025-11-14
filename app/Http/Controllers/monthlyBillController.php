<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\MealRate;
use App\Models\MealRecords;
use App\Models\ExpenseHeads;
use App\Models\User;
use App\Models\MemberAdvance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Bazar;

class monthlyBillController extends Controller
{
    public function monthlyBill()
{
    $currentMonth = now()->month;
    $currentYear = now()->year;

    // Total Members (active)
    $totalMembers = User::where('status', 'active')->count();

    // Meal Counts
    $mealRecords = MealRecords::where('user_id', Auth::id())
        ->select('date', 'breakfast', 'lunch', 'dinner', 'guest')
        ->get();
        
        $totalCount = [
        'breakfast' => $mealRecords->sum('breakfast'),
        'lunch' => $mealRecords->sum('lunch'),
        'dinner' => $mealRecords->sum('dinner'),
        'guest' => $mealRecords->sum('guest')
    ];

    $totalMeal = array_sum($totalCount);

    // all total meals in month of all user
    $totalMealsAllMembers = MealRecords::whereMonth('date', $currentMonth)
    ->whereYear('date', $currentYear)
    ->get()
    ->sum(function($meal) {
        return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
    });

    // all total meals in month of auth user
    $usersTotalMeal = MealRecords::where('user_id', Auth::id())
    ->whereMonth('date', $currentMonth)
    ->whereYear('date', $currentYear)
    ->get()
    ->sum(function($meal) {
        return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
    });
    



    // Bazar Expense (Total)
    $bazarBill = Bazar::whereMonth('date', $currentMonth)
                    ->whereYear('date', $currentYear)
                    ->sum('amount');

    // Other Utility Bills (Grouped)
    $allBills = ExpenseHeads::whereMonth('created_at', $currentMonth)
                        ->whereYear('created_at', $currentYear)
                        ->get()
                        ->groupBy('head');
        
        $members = User::whereIn('role', ['member', 'accountant', 'operations'])
                        ->where('status', 'active')
                        ->get();
        $totalMembers = $members->count();

    //member bazar bill per member
    $bazarBillPerHead = $bazarBill / $totalMealsAllMembers * $usersTotalMeal;    

    // Total utility bill per member
    $utilityPerHead = 0;

    foreach ($allBills as $head => $items) {
        $utilityPerHead += $items->sum('amount') / $totalMembers;
    }

    // Final Due = Utility + Bazar
    $totalDue = $utilityPerHead + $bazarBillPerHead;

    // Member advance subtract
    $userId = Auth::id();   // safer way

    if (!$userId) {
        return redirect()->route('/')->with('error', 'Please login first');
    }
     $advance = MemberAdvance::where('user_id', $userId)
                        ->whereMonth('created_at', $currentMonth)
                        ->whereYear('created_at', $currentYear)
                        ->get();
    $totalAdvance = $advance->sum('advance');

    $payable = $totalDue - $totalAdvance;


    return view('members.bills', [
        'totalMembers' => $totalMembers,
        'totalMeal' => $totalMeal,
        'bazarBill' => $bazarBill,
        'allBills' => $allBills,
        'utilityPerHead' => $utilityPerHead,
        'totalDue' => $totalDue,
        'totalAdvance' => $totalAdvance,
        'payable' => $payable,
        'totalCount' => $totalCount,
        'bazarBillPerHead'=> $bazarBillPerHead
    ]);
}

}
