<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginApiController extends Controller
{
    /**
     * Handle login requests.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): JsonResponse
    {
        $data = $request->only('email', 'password');
    
        // Log the received data
        \Log::info('Login attempt', $data);
    
        // Attempt login as admin
        if (Auth::guard('owner')->attempt($data)) {
            $token = Auth::guard('owner')->user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => Auth::guard('owner')->user(),
            ], 200);
        }
    
        // Attempt login as user
        if (Auth::guard('web')->attempt($data)) {
            $token = Auth::guard('web')->user()->createToken('authToken')->plainTextToken;
            return response()->json([
                'token' => $token,
                'user' => Auth::guard('web')->user(),
            ], 200);
        }
    
        // Handle invalid credentials
        return response()->json(['message' => 'Invalid credentials'], 401);
    }
    
    /**
     * Handle logout requests.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        $user = Auth::guard('web')->user(); // Assuming default guard is web, adjust if needed
        if ($user) {
            $user->currentAccessToken()->delete();
        }

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
