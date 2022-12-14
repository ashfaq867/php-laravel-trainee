<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User
    */
    public function createuser(Request $request){
        try {
            $validateUser= Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:Users,email',
            'password'=>'required'
            ]);
            if($validateUser->fails()){
                return response()->json(
                    [
                        'status'=>'false',
                        'message'=>'User Credentials not match',
                        'erros'=>$validateUser->errors()
                    ],401
                    );
            }
            $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]);
            return response()->json(
                [
                    'status'=>'false',
                    'message'=>'User Created successfully!',
                    'Token'=>$user->createToken("API TOKEN")->plainTextToken

                ],200
                );
        }catch (\Throwable $th) {
            return response()->json(
                [
                    'status'=>'false',
                    'message'=>$th->getMessage()
                ],500
                );
        }

    }

    /**
     * Create User
     * @param Request $request
     * @return User
    */
    public function loginUser(Request $request){
        try {
            $validateUser= Validator::make($request->all(),[
                'email'=>'required|email',
                'password'=>'required'
                ]);
                if($validateUser->fails()){
                    return response()->json(
                        [
                            'status'=>'false',
                            'message'=>'User Credentials not match',
                            'erros'=>$validateUser->errors()
                        ],401
                        );
                    if(!Auth::attempt($request->only(['email','password']))){
                        return response()->json(
                            [
                                'status'=>'false',
                                'message'=>'Email Or Password Not Match!'
                            ],401
                            );
                    }
                }
            $user=User::where('email',$request->email)->first();
            return response()->json(
                [
                    'status'=>'true',
                    'message'=>'User Login successfully!',
                    'Token'=>$user->createToken("API TOKEN")->plainTextToken

                ],200
                );
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'status'=>'false',
                    'message'=>$th->getMessage()
                ],500
                );
        }
        }
}

