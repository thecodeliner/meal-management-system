<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bazar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class OperationController extends Controller
{
    //overview
    public function overview()
    {
        return view('operation.overview');
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
            'user_id' => auth()->id(),
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
