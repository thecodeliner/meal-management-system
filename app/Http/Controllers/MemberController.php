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
use App\Models\Payment;

class MemberController extends Controller
{
    //member overview
    public function overview()
    {
        $currentMonth = now()->month;
        $currentYear = now()->year;

        
        
        //my total meals
        $myTotalMeals = MealRecords::where('user_id', Auth::id())
        ->get()
        ->sum(function ($meal) {
            return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
        });

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

        //my meal cost
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
    $bazarBillPerHead = 0;

        if ($totalMealsAllMembers > 0) {
            $bazarBillPerHead = $bazarBill / $totalMealsAllMembers * $usersTotalMeal;
        }
        //my total dues
        $totalAdvance  = MemberAdvance::where('user_id', Auth::id())
                                ->sum('advance');
        $myTotalPayments = $totalAdvance;        
       
        
      
        
        return view('members.overview', 
        compact( 'myTotalMeals', 'bazarBillPerHead', 'totalAdvance', 'totalCount')
    );

    }

    //member meal
    public function meals()
    {
        $mealRates = MealRate::whereIn('meal_type', ['breakfast', 'lunch', 'dinner','guest'])
        ->pluck('rate', 'meal_type');

        $mealRecords = MealRecords::where('user_id', Auth::id())
        ->orderBy('date', 'desc')
        ->paginate(10);

        return view('members.meals', compact('mealRates', 'mealRecords') );
    }

    //member meal record
    public function mealRecord(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to submit meals.');

        }elseif(Auth::user()->status !== 'active'){
            return redirect()->back()->with('error', 'Your account is inactive. Please contact the manager.');
        }

        // Validate incoming data
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'breakfast' => 'required|integer|min:0',
            'lunch' => 'required|integer|min:0',
            'dinner' => 'required|integer|min:0',
            'guest' => 'nullable|integer|min:0',
        ]);
        $userId = Auth::id();
        // Check if a record already exists for this user and date
        $exists = MealRecords::where('user_id', $userId)
            ->where('date', $validated['date'])
            ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'You have already submitted meals for this date.');
        }

        // Get meal rates from DB
        $mealRates = MealRate::whereIn('meal_type', ['Breakfast','Lunch','Dinner','Guest'])
            ->get()
            ->keyBy(fn($item) => strtolower($item->meal_type))
            ->map(fn($item) => $item->rate)
            ->toArray();

        //  Calculate total = qty * rate
        $total =
            ($validated['breakfast'] * ($mealRates['breakfast'] ?? 0)) +
            ($validated['lunch'] * ($mealRates['lunch'] ?? 0)) +
            ($validated['dinner'] * ($mealRates['dinner'] ?? 0)) +
            ($validated['guest'] * ($mealRates['guest'] ?? 0));

        //  Save the record
        MealRecords::create([
            'user_id' => $userId,
            'date' => $validated['date'],
            'breakfast' => $validated['breakfast'],
            'lunch' => $validated['lunch'],
            'dinner' => $validated['dinner'],
            'guest' => $validated['guest'],
            'total' => $total,
        ]);

        return redirect()->back()->with('success', 'Meal record submitted successfully!');


    }

    //member bills
    // public function bills()
    // {   
    //     //total meal count
    //      $mealRecords = MealRecords::where('user_id', Auth::id())
    //     ->select('date', 'breakfast', 'lunch', 'dinner', 'guest')
    //     ->get();
        
    //     $totalCount = [
    //         'breakfast' => $mealRecords->sum('breakfast'),
    //         'lunch' => $mealRecords->sum('lunch'),
    //         'dinner' => $mealRecords->sum('dinner'),
    //         'guest' => $mealRecords->sum('guest')
            
    //         ];
    //     //total meal count end
    //     $totalMeal = $totalCount['breakfast'] + $totalCount['lunch'] + $totalCount['dinner'] + $totalCount['guest'];

    //     // //find meal rates calculation 
    //     // $mealType = ['breakfast', 'lunch', 'dinner','guest'];
    //     // $mealRates = MealRate::whereIn('meal_type', $mealType)
    //     // ->pluck('rate', 'meal_type');
        
    //     // $totalRate = [
    //     //     'breakfast' => $mealRates['breakfast'] * $totalCount['breakfast'],
    //     //     'lunch' => $mealRates['lunch'] * $totalCount['lunch'],
    //     //     'dinner' => $mealRates['dinner'] * $totalCount['dinner'],
    //     //     'guest' => $mealRates['guest'] * $totalCount['guest'],
    //     //     ];
    //     // $subTotal = array_sum($totalRate);

       
        
        
        
    //     //Member Advance
    //     $userId = Auth::user()->id;
    //     $memberAdvance = MemberAdvance::where('user_id', $userId)
    //                     ->latest('created_at')
    //                     ->first();
    //     //total advance      
    //     // $currentMonth = carbon::now()->month;
    //     // $currentYear =  carbon::now()->year;
    //     $currentDate = Carbon::now();
    //     $currentMonth = $currentDate->month;
    //     $currentYear = $currentDate->year;

    //     $advance = MemberAdvance::where('user_id', $userId)
    //                     ->whereMonth('created_at', $currentMonth)
    //                     ->whereYear('created_at', $currentYear)
    //                     ->get();

    //     $totalAdvance = $advance->sum('advance'); 

        
        
    //     //House Rent
       
    //     // $expences = ExpenseHeads::where('head', 'Room Rent')
    //     //               ->whereMonth('created_at', $currentMonth)
    //     //               ->whereYear('created_at', $currentYear)
    //     //               ->first();
                        
    //     //total members
        
    //       //Utility bills
    //     $allBills = ExpenseHeads::whereMonth('created_at', $currentMonth)
    //                     ->whereYear('created_at', $currentYear)
    //                     ->get()
    //                     ->groupBy('head');
        
    //     $members = User::whereIn('role', ['member', 'accountant', 'operations'])
    //                     ->where('status', 'active')
    //                     ->get();
    //     $totalMembers = $members->count();
    //     //dd($totalMembers);
    //     //$roomRent = $expences ? $expences->amount : 0;
        
    //     //$memberRent = $roomRent / $totalMembers;
        
      
                        
    //     // $gasBill = $utilityBills->get('Gas Bill')->first();
    //     // $gasBillAmount = $gasBill->amount;      
        
    //     $bazarTotal = Bazar::whereMonth('created_at', $currentMonth)
    //                     ->whereYear('created_at', $currentYear)
    //                     ->sum('amount');

    //     $bazarBill = $bazarTotal / $totalMembers;

    //     return view('members.bills' , compact('totalCount', 
                                                
                                               
    //                                             'memberAdvance', 
    //                                             'totalAdvance',
    //                                             'totalMembers',
    //                                             'allBills',
    //                                             'bazarBill',
    //                                             'totalMeal'
                                                
    //                                             ));
        
    //     //
    // }
    
    //member profile
    public function profile()
    {
        $users = Auth::user();
        return view('members.profile', compact('users'));
    }

    //member history
    public function history()
    {
        $peymentHistorey = Payment::where('user_id', Auth::id())    
                            ->orderBy('id', 'desc')
                            ->get();
        //for month


        return view('members.history', compact('peymentHistorey'));
    }


    
    public function mealAdvance(Request $request){
        
        $user = Auth::user();
        if ($user->status != 'active') {
        return redirect()->back()->with('error', 'Your account is inactive. Please contact the manager.');
        }

        $validated = $request -> validate([
            'advance' => 'required',
            
            
            ]);
           
            
            MemberAdvance::create([
               'advance' =>  $validated['advance'],
               'user_id' =>  $user->id,
                
                ]);
            
            return redirect()->back()->with('success', 'Advance added successfully');
    }


}
