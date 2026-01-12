<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'  =>'required|string|max:255',
            'email'  =>'required|string|email|max:255|unique:users,email',
            'password'  =>'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()){
            return response()->json([
                'message'   =>'Validation did not go through.',
                'errors' =>$validator->errors(),
            ], 422);
        }

        $data = $validator->validated();

        $user = User::create([
            'name'  =>$data['name'],
            'lastname'  =>$data['lastname'],
            'email'  =>$data['email'],
            'password'  =>$data['password'],
        ]);

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message'   =>'Successful registration!',
            'user'  =>$user,
            'token' =>$token,
        ], 201);

    }


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
        'name'  =>'required|string|max:255',
        'email'  =>'required|string|email|max:255|unique:users,email',
        ]);

        if ($validator->fails()){
            return response()->json([
                'message'   =>'Validation did not go through.',
                'errors' =>$validator->errors(),
            ], 422);
        }

        if(Auth::attempt($validator->validated())){
            return response()->json([
                'message'   =>'Wrong email or password.'
            ], 401);
        }

        $user = Auth::user();

        /** @var \App\Models\User $user */
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'message'   =>'Successful login!',
            'user'  =>$user,
            'token' =>$token,
        ], 200);
    }

    public function logout(Request $request){
        $user = $request->user();
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message'=>'You have successfully logged out.',
        ], 200);
    }


    public function me(Request $request){
        /** @var \App\Models\User $user */
        return response()->json($request->$user());
    }


}
