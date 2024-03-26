<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        $user = auth()->user();


        $user->tokens()->currentAccessToken()->delete();

        $response = [
            'data' => [],
            'message' => 'با موفقیت خارج شدید',
            'success' => true,
        ];

        return response()->json($response,200);
    }
}
