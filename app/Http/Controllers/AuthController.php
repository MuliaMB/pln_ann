<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Menampilkan halaman registrasi
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Proses login user
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have successfully logged in');
        }

        return redirect("login")->withErrors(['login' => 'Oops! Invalid credentials']);
    }

    /**
     * Proses registrasi user baru
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $this->create($data);

        return redirect("dashboard")->withSuccess('Great! You have successfully registered and logged in');
    }

    /**
     * Menampilkan halaman dashboard (jika login)
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect("login")->withErrors(['access' => 'Oops! You do not have access']);
    }

    /**
     * Menyimpan data user ke database
     */
    public function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
