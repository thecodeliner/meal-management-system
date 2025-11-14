<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
                $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|',
            ]);
            
            if (Auth::attempt($credentials)) {  // ✅ without specifying guard
                $role = Auth::user()->role;
            
                if ($role === 'manager') {
                    return redirect()->intended('/manager/overview')->with('success', 'Logged in successfully!');
            
                } elseif ($role === 'accountant') {
                    return redirect()->intended('/accountant/overview');
            
                } elseif ($role === 'operations') { // must match DB spelling
                    return redirect()->intended('/operation/overview');
            
                } elseif ($role === 'member') {
                    return redirect()->intended('/member/overview');
            
                } else {
                    return redirect()->back()->with('error', 'Credentials not matched!');
                }
            }
            
            // If login fails
            return back()->withErrors([
                'email' => 'Invalid credentials.'
            ]);


}

    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with('success', 'Logged out successfully');
        
    }


}
