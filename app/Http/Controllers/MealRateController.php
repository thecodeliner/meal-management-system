<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MealRate;
use Illuminate\Support\Facades\Hash;

class MealRateController extends Controller
{
    public function mealRate()
    {
        $mealRates = MealRate::orderBy('effective_from', 'asc') // newest first
        ->get()
        ->unique('meal_type'); // keep only one record per meal_type

        return view('manager.meal', compact('mealRates'));
    }



    public function storeRate(Request $request)
    {
     $validated = $request->validate([
        'meal_type' => 'required|string|max:50',
        'rate' => 'required|numeric|min:0',
        'effective_from' => 'required|date',
        'effective_to' => 'nullable|date|after_or_equal:effective_from',
    ]);

    // Update existing record if meal_type exists, otherwise create new
    MealRate::updateOrCreate(
        ['meal_type' => $validated['meal_type']], // condition to check existing record
        [
            'rate' => $validated['rate'],
            'effective_from' => $validated['effective_from'],
            'effective_to' => $validated['effective_to'] ?? null,
        ]
    );

    return redirect()->back()->with('success', 'Meal rate saved successfully!');


     }
}




