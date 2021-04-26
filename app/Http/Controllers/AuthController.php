<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth/register');
    }

    public function register(RegisterFormRequest $registerFormRequest)
    {
        $validatedData = $registerFormRequest->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);
        return redirect('/');
    }
    
    public function showLogin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $remember = $request->remember_me;
        $remember = $remember == 'on';

        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return $user->hasRole(['Super Admin', 'Teacher']) ? redirect('/admin') : redirect('/');
        }

        return back()->withErrors([
            'email' => 'Sai tên tài khoản hoặc mật khẩu.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
