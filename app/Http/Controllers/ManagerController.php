<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ExpenseHeads;

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
        return view('manager.reports');
    }
    public function profile()
    {
        return view('manager.profile');
    }
    public function overview()
    {
        return view('manager.overview');
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
        return view('manager.search');
    }
}
