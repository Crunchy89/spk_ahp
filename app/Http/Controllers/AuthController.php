<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $check = $request->only('username', 'password');
        if (Auth::attempt($check)) {
            return redirect()->route('dashboard')->with(['status' => 'success', 'message' => 'selamat datang' . ucfirst(Auth::user()->username)]);
        } else {
            return back()
                ->with(['status' => 'error', 'message' => 'Username atau password salah'])
                ->withInput(['username' => $request->username, 'password' => $request->password]);
        }
        return redirect('login');
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
