<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('inscription');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès.');
    }

    public function showLoginForm()
    {
        return view('connexion');
    }

    public function login(Request $request)
    {
      
        $credentials = $request->only('email', 'password');
      

        if (!Auth::attempt($credentials)) {
           
            return back()->withErrors(['email' => 'Email ou mot de passe invalide.']);
        }

        $user = Auth::user();


        if ( $user->id_role == 1) {
            return redirect()->route('admin.index');
        
        } elseif ($user->id_role == 2) {
            return redirect()->route('useragricole');

        }else
        {
            return redirect()->route('agriculteur.Calendrier');

        }

       
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }
}
