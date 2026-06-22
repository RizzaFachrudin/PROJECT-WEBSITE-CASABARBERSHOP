<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'number' => 'required|string|max:14',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'number' => $request->number,
            'password' => Hash::make($request->password),
            'verif_code' => rand(100000, 999999),
        ]);

        return redirect()->route('user.login')->with('success', 'Akun berhasil dibuat, silakan login!');
    }
}
