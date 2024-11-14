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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Data kredensial
        $credentials = $request->only('email', 'password');

        // Coba autentikasi user
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // Login berhasil
            $request->session()->regenerate();
            return redirect()->route(route: 'dashboard'); // Redirect ke halaman home atau halaman yang diinginkan
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
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
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set role menjadi 'user' secara otomatis
        ]);

        // Redirect ke halaman setelah registrasi
        return redirect()->route('login.form')->with('success', 'Registration successful!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // Menghapus sesi pengguna
        $request->session()->regenerateToken(); // Mengamankan token CSRF baru

        return redirect('/login'); // Redirect ke halaman login atau halaman lain
    }
}
