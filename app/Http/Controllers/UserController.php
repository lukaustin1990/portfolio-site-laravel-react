<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function signup(Request $request)
    {
        // 1. validate
        $data = $request->validate([
            "email" => "required|email|unique:users,email",
            "password" => "required|string|min:6|confirmed"
        ]);

        // 2. create user
        $user = User::create([
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);
        
        // 3. log them in
        Auth::login($user);
        
        // 4. return response
        return response()->json($user, 201);
    }    
}
