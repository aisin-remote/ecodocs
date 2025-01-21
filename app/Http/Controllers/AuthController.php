<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('pages.auth.login');
    }
    public function login(Request $request)
{
    $request->validate([
        'login' => 'required', // Bisa berupa email atau NPK
        'password' => 'required',
    ]);

    // Cek apakah login berupa email atau NPK
    $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'npk';

    // Data kredensial
    $credentials = [
        $loginField => $request->login,
        'password' => $request->password,
    ];

    // Coba autentikasi user
    if (Auth::attempt($credentials, $request->has('remember'))) {
        // Login berhasil
        $request->session()->regenerate();
        return redirect()->route('dashboard'); // Redirect ke halaman dashboard
    }

    // Jika login gagal
    return back()->withErrors([
        'login' => 'The provided credentials do not match our records.',
    ])->onlyInput('login');
}

    public function registerForm()
    {
        return view('pages.auth.register');
    }
    public function register(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|confirmed',
        // ]);

        // Membuat pengguna baru dengan role user
        User::create([
            'name' => $request->name,
            'npk' => $request->npk,
            'dept' => $request->dept,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->dept === 'MS' ? 'Safety' : 'GA',
        ]);

        // Redirect ke halaman setelah registrasi
        return redirect()->route('login.form')->with('success', 'Registration successful!');
    }
    public function logout()
    {
        // Logout user
        Auth::logout();

        // Menghapus session yang terkait
        session()->forget('invalidate');
        session()->forget('regenerateToken');
        // Redirect ke halaman login
        return redirect()->route('login.form')->with('success', 'you have successfully logged out!');
    }
}
