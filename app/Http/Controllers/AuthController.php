<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to the intended page or users index after successful login
            return redirect()->route('users.index');
            // dd($request->all());
        } else {
            // Redirect back to login with an error message
            return redirect('/login')->withErrors([
                'login' => 'Invalid email or password.',
            ]);
        }
    }
    
    


    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:roles,email', // Ensure unique email in 'roles' table
            'password' => 'required|min:5',
        ]);
    
        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);
    
        $role = Role::create($data);
    
        return view('register.index')->with('success', 'Registration successful!');
    }
    

    public function loginPage()
    {
        // dd(123);
        return view('login.index');
    }
    public function  registerPage()
    {
        // dd(123);
        return view('register.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
