<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout()
    {
        $user = auth()->user();

        $response = [
            'data' => [],
            'message' => 'با موفقیت خارج شدید',
            'success' => true,
        ];

        $user->currentAccessToken()->delete();

        $cookie = cookie()->forget('auth_token');
        $isLoginCookie = cookie('is_login',false,1440,null,null,null,false);

        return response()->json($response, 200)->withCookie($cookie)->withCookie($isLoginCookie);
    }
}
