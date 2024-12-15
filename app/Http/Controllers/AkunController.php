<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;  
use Illuminate\Support\Facades\Hash;  

class AkunController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])) {
            return redirect('/Dashboard');
        }
        return redirect()->back();
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect('/login');
    }

    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required',  
            'password' => 'required',  
        ]);

        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,  // Gunakan 'name' dari inputan form
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Pastikan password di-hash
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke dashboard
        return redirect()->route('Dashboard');
    }
}
