<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function ShowRegister()
    {
        return view('auth.Register');
    }
    public function Showlogin()
    {
        return view('auth.login');
    }
    public function Register(Request $request)
    {
        $valedated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($valedated);
        Auth::login($user);
        return redirect()->route('ninjas.index');
    }
    public function login(Request $request)
    {
        $valedated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($valedated)) {
            $request->session()->regenerate();
            return redirect()->intended(route('ninjas.index'));
        }
        throw ValidationException::withMessages([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('show.login');
    }
}
