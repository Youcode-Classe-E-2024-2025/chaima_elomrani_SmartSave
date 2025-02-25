<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showRegister()
    {
        return view('/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:500|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'sometimes|string|in:normal_user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/login')->with('success', 'Registration successful! Please log in.');
        
    }


    public function showlogin()
    {
        return view('/login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        if(Auth::attempt(['email'=>$request->email , 'password'=>$request->password])){
            return redirect('/')->with('success' , 'login went successfully');
        }

        // return back()->withErrors(['email' => 'Invalid email']);
    }



    // public function logout(){
    //     Auth::logout();
    //     return redirect('home');
    // }


}
