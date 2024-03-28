<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $inputs = $request->only(['email', 'password']);

        if (!auth()->attempt(['email' => $inputs['email'], 'password' => $inputs['password']])) {
            $response = [
                'data' => [],
                'message' => 'اطلاعات کاربری درست نیست',
                'success' => false,
            ];

            return response()->json($response, 401);
        }

        $user = auth()->user();

        $token = $user->createToken('API_TOKEN')->plainTextToken;

        $cookie = cookie('auth_token', $token,1440);
        $isLoginCookie = cookie('is_login',true,1440,null,null,null,false);

        $response = [
            'data' => [],
            'message' => 'با موفقیت وارد شدید',
            'success' => true,
        ];

        return response()->json($response,200)->withCookie($cookie)->withCookie($isLoginCookie);
    }
}
