<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MealRecords;
use App\Models\ExpenseHeads;
use App\Models\MemberAdvance;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Bazar;

class AccountantController extends Controller
{
    public function overview()

    {
        $totalAdvances = MemberAdvance::sum('advance');
        //total payments
        $paymentReceived = Payment::sum('amount');
        $totalPayments = $totalAdvances + $paymentReceived;
        //total dues
        
        $totalBazar = Bazar::sum('amount');
        $totalUtility = ExpenseHeads::sum('amount');
        $totalDues = ($totalBazar + $totalUtility) - $totalPayments;
        //paid members
        
        $payments = Payment::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10); 
        //show month name from created_at
        foreach ($payments as $payment) {
            $payment->month = Carbon::parse($payment->created_at)->format('F Y');
        }
        return view('accountant.overview', compact('payments', 'totalPayments', 'totalDues'));
        
    }

   
   

    public function dues()
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
        $dueList[] = [
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

    return view('accountant.dues', [
        'dueList' => $dueList,
        'users' => $users,

    ]);       
    }

    public function receivePayment(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
        ]);

        // Create a new MemberAdvance record
        Payment::create([
            'user_id' => $request->input('user_id'),
            'amount' => $request->input('amount'),
            'type' => $request->input('type'),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Payment received successfully.');
    }

     public function payments(Request $request)
    {
        // Fetch payment records with pagination date and for month from date range
        
        $payments = Payment::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10); 
        //show month name from created_at
        foreach ($payments as $payment) {
            $payment->month = Carbon::parse($payment->created_at)->format('F Y');
        }
        return view('accountant.payments', compact('payments'));


        
       
    }


     public function financial()
    {
        //total income from payments
        $totalIncome = Payment::sum('amount');
        //bazar expense
        $totalBazar = Bazar::sum('amount');
        //utility expense
        $totalUtility = ExpenseHeads::sum('amount');
        //total expense
        $totalExpense = $totalBazar + $totalUtility;
        //net balance
        $netBalance = $totalIncome - $totalExpense;

        //room rent
        $roorRent = ExpenseHeads::where('head', 'Room Rent')->sum('amount');

        $bazars = Bazar::all();
        $expenses = ExpenseHeads::all();

        $income= [
            'totalIncome' => $totalIncome,
            'totalBazar' => $totalBazar,
            'totalUtility' => $totalUtility,
            'totalExpense' => $totalExpense,
            'netBalance' => $netBalance,
            'roorRent' => $roorRent,
        ];
        return view('accountant.financial', compact('income', 'bazars', 'expenses'));
    }

    public function profile()
    {
        return view('accountant.profile');
    }
}
