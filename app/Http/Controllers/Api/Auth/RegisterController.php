<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request){
        $inputs = $request->only(['name','email', 'password']);

        $inputs['password'] = Hash::make($inputs['password']);

        $user = User::create($inputs);

        auth()->login($user);


        $token = $user->createToken('API_TOKEN')->plainTextToken;

        $cookie = cookie('auth_token', $token,1440);
        $isLoginCookie = cookie('is_login',true,1440,null,null,null,false);


        $response = [
            'data' => [],
            'message' => 'با موفقیت ثبت نام کردید',
            'success' => true,
        ];

        return response()->json($response,200)->withCookie($cookie,$isLoginCookie)->withCookie($isLoginCookie);


    }
}
