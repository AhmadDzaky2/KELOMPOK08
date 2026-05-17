<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // tampil register
    public function showRegister()
    {
        return view('register');
    }

    // proses register
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'role' => 'customer',
        ]);

        return redirect('/login');
    }

    // tampil login
    public function showLogin()
    {
        return view('login');
    }

    // proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $login = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($login) {
            $request->session()->regenerate();

            // Jika admin, masuk ke halaman admin products
            if (Auth::user()->role == 'admin') {
                return redirect('/admin/products');
            }

            // Jika customer, masuk ke halaman utama
            return redirect('/');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}