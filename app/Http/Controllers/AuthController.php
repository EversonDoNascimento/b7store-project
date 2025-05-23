<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\StateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }
    public function register_action(RegisterRequest $request){
        
        $userData = $request->only(["email", "name", "password"]);
        $userData['password'] = Hash::make($userData['password']);
        $user = User::create($userData);
        Auth::loginUsingId($user->id);
        return \redirect(route("state.select-state"));
        // dd($user);
    }

    public function login_action(LoginRequest $request){
        $dataInput = $request->only(["email", "password"]);
        if(!Auth::attempt($dataInput)){
            $data['message'] = "Email or Password Invalid";
            return \view('auth.login', $data);
        }
        
        return \redirect()->route("dashboard.my_account");
    }

    public function logout(){
        Auth::logout();
        return \redirect(route("login"));
    }
  
}
