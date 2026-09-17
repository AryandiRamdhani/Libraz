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

    public function qrLogin(Request $request)
    {
        $qrData = trim($request->input('qr_data', ''));

        if (empty($qrData)) {
            return response()->json([
                'success' => false,
                'message' => 'Data QR / Barcode kosong.',
            ], 422);
        }

        $nis = null;

        // 1. Check if JSON
        if (str_starts_with($qrData, '{') && str_ends_with($qrData, '}')) {
            $json = json_decode($qrData, true);
            if (is_array($json)) {
                if (isset($json['nis'])) {
                    $nis = (string)$json['nis'];
                } elseif (isset($json['id'])) {
                    $nis = (string)$json['id'];
                }
            }
        }

        // 2. Check format BZ-YYYY-NIS-XX (e.g. BZ-2024-108827-01)
        if (!$nis && preg_match('/^BZ-(\d{4})-(\d+)(?:-\d+)?$/i', $qrData, $matches)) {
            $nis = $matches[1] . $matches[2];
        }

        // 3. Fallback: extract digits if length is typical NIS (e.g. 8-14 digits)
        if (!$nis) {
            if (preg_match('/\b(\d{8,14})\b/', $qrData, $matches)) {
                $nis = $matches[1];
            } else {
                $nis = preg_replace('/[^a-zA-Z0-9]/', '', $qrData);
            }
        }

        $user = \App\Models\User::where('nis', $nis)->first();

        // 4. Try exact match with raw string if not found
        if (!$user) {
            $user = \App\Models\User::where('nis', $qrData)->first();
        }

        if (!$user) {
            return response()->json([
                'success' => false,
                'nis' => $nis ?: $qrData,
                'message' => 'Kartu Pelajar tidak terdaftar (NIS: ' . ($nis ?: $qrData) . '). Silakan gunakan login manual atau daftarkan akun.',
            ], 404);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'message' => 'Fast Pass Berhasil! Selamat datang, ' . $user->name,
            'user' => [
                'name' => $user->name,
                'nis' => $user->nis,
                'level' => $user->level,
                'level_name' => $user->level_name,
            ],
            'redirect' => route('katalog'),
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
