<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\AuthResource;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Validation and login
        if (! auth()->attempt($data)) {
            return response([
                'status' => false,
                'eerror' => 'ERR_INVALID_CREDS',
                'message' => 'incorrect username or password',
            ], 401);
        }

        // Remove all token
        auth()->user()->tokens()->delete();

        // Make token
        $access_token = auth()->user()->createToken('access_token')->accessToken;

        $data = auth()->user();
        $data->token = $access_token;

        return new AuthResource($data);
    }

    public function logout()
    {
        // Remove token
        auth()->user()->tokens()->delete();

        return response([
            'status' => true,
            'message' => 'The user success logout',
        ]);
    }
}
