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

        return response()->json($response, 200);
    }
}
