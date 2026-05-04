<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManualController extends Controller
{
    public function index()
    {
        return view('manual-auth.login');
    }

    public function loginProses (Request $request)
    {
        $credintials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email wajib diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password wajib diisi',
            ]);
            if (Auth::attempt($credintials)) {
                $request->session()->regenerate();
                toast('Login berhasil.','success');
                return redirect()->route('dashboard');
            }

    toast('Login gagal. Silakan coba lagi.','error');
            return back();
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toast('Anda telah logout.','success');
        return redirect()->route('login');
    }
}
