<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect('/admin'); // Redirect ke halaman admin setelah pendaftaran
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Show the form for signing in.
     */

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'username' => 'required|string',
    //         'password' => 'required|string',
    //     ]);

    //     // Mencari pengguna berdasarkan username
    //     $user = User::where('email', $credentials['username'])->orWhere('name', $credentials['username'])->first();

    //     if ($user && Auth::attempt(['email' => $user->email, 'password' => $credentials['password']])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/admin'); // Redirect ke halaman admin
    //     }

    //     return back()->withErrors([
    //         'username' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect khusus untuk admin
            if($request->email === 'admin@example.com') {
                return redirect()->intended('admin/dashboard');
            }

            // Redirect default untuk user lain
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang dimasukkan salah.',
        ])->onlyInput('email');
    }

    // Admin Login
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin'); // Redirect ke halaman admin
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Admin Logout
    public function adminLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login'); // Redirect ke halaman login admin
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Ganti dengan view yang sesuai
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Ganti dengan view yang sesuai
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password'])
        ]);

        // Login otomatis setelah register
        Auth::login($user);
        
        // Regenerate Session
        $request->session()->regenerate();

        // Redirect ke beranda
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
