<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try {
        $login = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string'
            ]);
            

            if( !Auth::attempt($login)) {
                return response(['message' => 'Invalid login credential.']);
            }

            $accessToken = Auth::user()->createToken('authToken')->accessToken;

            return response(['user' => Auth::user(), 'access_token' => $accessToken]);
        } catch (Exception $e) {
            return response()->json([
                "error" => $e->getMessage()
            ]);
        }
    }
}
