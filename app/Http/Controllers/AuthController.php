<?php

namespace App\Http\Controllers;
use App\Models\account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('layouts.login');
     }
     public function login(Request $request)
     {
         $credentials = $request->validate([
             'email' => 'required',
             'password' => 'required',
         ]);
     
         $email = $credentials['email'];
         $password = $credentials['password'];
     
         $user = Account::where(function ($query) use ($email) {
             $query->where('admin_username', $email)
                 ->orWhere('admin_email', $email);
         })->first();
     
         if ($user && $user->admin_password === $password) {
             Auth::login($user);
             return redirect()->intended('home');
         } else {
             return redirect()->back()->withErrors(['message' => 'Incorrect email or password']);
         }
     }


     }
