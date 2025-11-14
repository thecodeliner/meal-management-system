<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Models\MealRecords;
use App\Models\MealRate;

use Illuminate\Support\Facades\Auth;

class MealRecordsController extends Controller
{
    public function mealRecord(Request $request){

       // 1️⃣ Validate incoming data
       $validated = $request->validate([
        'date' => 'required|date',
        'breakfast' => 'required|integer|min:0',
        'lunch' => 'required|integer|min:0',
        'dinner' => 'required|integer|min:0',
        'guest' => 'required|integer|min:0',
    ]);

    // 2️⃣ Get the latest rates from database
    $mealRates = MealRate::whereIn('meal_type', ['Breakfast', 'Lunch', 'Dinner', 'Guest'])
        ->pluck('rate', 'meal_type');

    // 3️⃣ Safely calculate total = (qty × rate)
    $total =
        ($validated['breakfast'] * ($mealRates['Breakfast'] ?? 0)) +
        ($validated['lunch'] * ($mealRates['Lunch'] ?? 0)) +
        ($validated['dinner'] * ($mealRates['Dinner'] ?? 0)) +
        ($validated['guest'] * ($mealRates['Guest'] ?? 0));

    // 4️⃣ Save the record
    MealRecords::create([
        'user_id' => Auth::id(),
        'date' => $validated['date'],
        'breakfast' => $validated['breakfast'],
        'lunch' => $validated['lunch'],
        'dinner' => $validated['dinner'],
        'guest' => $validated['guest'],
        'total' => $total,
    ]);

    // 5️⃣ Redirect with success message
    return redirect()->back()->with('success', 'Meal record submitted successfully!');

    }
}
