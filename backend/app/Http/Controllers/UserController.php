<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|email|max:255|unique:users,email',
            'password'=>'required|string|min:8|confirmed',
        ]);

       $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
       ]);
       return response()->json(['message'=>'user registered Succeccfully','user'=>$user],201);

    }

    public function login(request $request)
    {
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);
        if (!Auth::attempt($request->only('email','password'))) 
        return response()->json(['message' => 'invalid email or password'], 401);

       $user= User::where('email',$request->email)->firstOrFail();
       $token=$user->createToken('auth_Token')->plainTextToken;
       return response()->json(['message'=>'user login Succeccfully','user'=>$user,'token'=>$token],201);

    }

    public function logout(request $request)
    {

        $request->user()->currentAccessToken()->delete;
       return response()->json(['message'=>'user Logout Succeccfully']);

        
    }




    

}
