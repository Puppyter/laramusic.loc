<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->all(), true)) {
            $request->session()->regenerate();
            return response(['status'=>true,'user'=>User::where('email',$request->email)->first()->id]);
        }
        return response(['status'=>false,'email' => 'Email or password is wrong']);
    }
    public function logout(){
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('users.index');
    }

    public function registration(Request $request)
    {
         if (User::where('email',$request->email)!=null){
             $request['password']= Hash::make($request->password);
             $user= User::create($request->all());
             Auth::login($user);
             return response(['status'=>true,'user'=>$user]);
         }
            return response(['status'=>false]);
    }
}
