<?php

namespace App\Http\Controllers;

use App\Mail\welcomeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register() {
        return view("auth.register");
    }
    public function store(Request $request) {
        $inputs = $request->validate([
            "name"=> "required|max:200",
            "email"=> "required|email|unique:users",
            "password"=> "required|confirmed",
        ]);
        $user = User::create([
            "name"=> $inputs["name"],
            "email"=> $inputs["email"],
            "password"=>  $inputs["password"],
        ]);


        return redirect()->route("idea.index")->with("success","Account created successfully!");
    }


    public function login()
    {
        return view("auth.login");
    }
    public function auth(Request $request)
    {
        $inputs = $request->validate([
            "email"=> "required|email|exists:users,email",
            "password"=> "required",
        ]);



        if (auth()->attempt($inputs)) {
            $request->session()->regenerate();
            $user = User::where("email", $inputs["email"])->first();
            return redirect()->route("idea.index")->with("success"," Hi $user->name Welcome Back");
        }
        

        return redirect()->route("login")->withErrors([
            "email"=> "E-mail Or password is incorrect!"
        ]);
    }

    public function logout()
    {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route("idea.index")->with("success","You are Logged out");


    }
}
