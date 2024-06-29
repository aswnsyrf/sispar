<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Periksa hak akses pengguna setelah berhasil login
            $user = Auth::user();
            if ($user->hak_akses == 'Pengunjung') {
                return redirect()->intended('homepage');
            }

            // Jika bukan pengunjung, arahkan ke dashboard
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Oops, email dan password salah bro!',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logoutgues(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('homepage');
    }
}
