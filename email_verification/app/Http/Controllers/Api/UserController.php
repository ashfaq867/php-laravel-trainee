<?php

namespace App\Http\Controllers\Api;

use Stringable;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\RegisterEvent;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function register(Request $req){
        $req->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|string|email',
            'password' =>'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $token = Str::random(10);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->remember_token = $token;
        $user->password = $req->password;
        $user->save();

        event(new RegisterEvent($user));

        return response()->json([
            'msg' => 'mail send',
        ]);
    }

    public function verify($token){
        $user = User::where('remember_token', $token)->first();
        $user->verify = 1;
        $user->save();
        if($user){
            return response()->json([
               'msg' => 'Thanks to verify your email',
            ]);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if (!$user) {
            return response([
                "Message" => "Provide Credentials Are Incorrect !",
            ], 401);
        }
        $token = $user->createToken('myToken')->plainTextToken;
        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response([
            'Message' => 'Successfully LogOut !',
            'Status' => 200,
        ]);
    }

}
