<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('katalog');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nis' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('katalog');
        }

        return back()->withErrors([
            'nis' => 'NIS atau Kata Sandi salah.',
        ]);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:users',
            'school_name' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'nis' => $validated['nis'],
            'school_name' => $validated['school_name'],
            'password' => \Illuminate\Support\Facades\Hash::make($validated['password']),
            'role' => 'Siswa',
            'level' => 1,
            'level_name' => 'Pembaca Baru',
            'xp' => 0,
            'max_xp' => 500,
        ]);

        Auth::login($user);
        
        return redirect()->route('katalog')->with('success', 'Pendaftaran berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
