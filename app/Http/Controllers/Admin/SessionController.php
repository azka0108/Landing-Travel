<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
     function index(){
        return view("admin/page/sesi/index");
    }


    function login(Request $request)
    {
        $doesntExist = User::where('email', $request->email)->doesntExist();

        if ($doesntExist) {
            return redirect()->back()->withInput($request->only('email'))->withErrors(['email' => "Username doesn't exist"]);
        }

        $credentials = $request->only(['email', 'password']);
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors(['password' => 'Password anda salah']);
    }
    // Fungsi logout
    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus sesi autentikasi

        $request->session()->invalidate(); // Mengosongkan semua data sesi
        $request->session()->regenerateToken(); // Menghasilkan token sesi baru untuk keamanan
        // Flash data untuk mengosongkan input
    Session::flash('old_email', ''); // Kosongkan email
    Session::flash('old_password', ''); // Kosongkan password

        return redirect()->intended(route('sesi.index'));
        // Redirect ke halaman login atau halaman lain setelah logout
    }

        
}