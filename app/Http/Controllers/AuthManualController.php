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
            ]);
            if (Auth::attempt($credintials)) {
                $request->session()->regenerate();
                return redirect()->route('kategori.index');
            }
            return back();
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
