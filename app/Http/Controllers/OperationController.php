<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bazar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use App\Models\ExpenseHeads;
use App\Models\Meal;
use App\Models\Payment;

use App\Models\MealRecords;
use App\Models\MemberAdvance;

use Carbon\Carbon;


class OperationController extends Controller
{
    //overview
    public function overview()
    {
        $bazars = Bazar::with('user')->orderBy('date', 'desc')->paginate(10);

        //todays bazar entries
        $todaysBazarCount = Bazar::whereDate('date', Carbon::today())->count();
        //meal today
        $totalMealsToday = MealRecords::whereDate('date', Carbon::today())
            ->get()
            ->sum(function($meal) {
                return $meal->breakfast + $meal->lunch + $meal->dinner + $meal->guest;
            });
        //monthly bazar total
        $monthlyBazarTotal = Bazar::whereMonth('date', Carbon::now()->month)
                                ->whereYear('date', Carbon::now()->year)
                                ->sum('amount');
        //active members
        $activeMembersCount = User::whereIn('role', ['member', 'operations', 'accountant'])
                                ->where('status', 'active')
                                ->count();

        
        return view('operation.overview', 
        compact('todaysBazarCount', 'totalMealsToday', 'monthlyBazarTotal', 'activeMembersCount', 'bazars')
    );
    }
    //bazars

    public function bazarEntry(Request $request)
    {
         $validated = $request->validate([
            'date' => 'nullable|date|after_or_equal:today',
            'items' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'notes' => 'nullable|string|max:500',
            

        ]);

        Bazar::create([
            'user_id' => auth::user()->id,
            'date' => $validated['date'],
            'items' => $validated['items'],
            'amount' => $validated['amount'],
            'notes' => $validated['notes'],
            
        ]);
        return redirect()->back()->with('success', 'Bazar entry added successfully.');
    }
    public function bazars(Request $request)
    {
       
       //$userName = Auth::user()->name;
       $bazars = Bazar::with('user')->orderBy('date', 'desc')->paginate(10);

        return view('operation.bazars', compact( 'bazars'));
    }
    //costing
    public function costing()
    {
        return view('operation.costing');
    }

    //profile
    public function profile(){
        return view('operation.profile');
    }

}
