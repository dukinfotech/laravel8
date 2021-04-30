<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
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

    public function login(LoginFormRequest $loginFormRequest)
    {
        $credentials = $loginFormRequest->validated();
        $remember = null;
        if (array_key_exists('remember_me', $credentials)) {
            $remember = $credentials['remember_me'];
            unset($credentials['remember_me']);
        }
        $remember = $remember == 'on';
        
        if (Auth::attempt($credentials, $remember)) {
            $loginFormRequest->session()->regenerate();
            $user = Auth::user();
            return $user->hasRole(['Super Admin', 'Teacher']) ? redirect('/admin') : redirect('/');
        }

        return back()
            ->withErrors([
                'email' => 'Sai tên tài khoản hoặc mật khẩu.',
            ])->withInput(
                $loginFormRequest->except('password')
            );;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
