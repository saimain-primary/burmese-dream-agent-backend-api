<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'agent_id' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt(['agent_id' => $request->agent_id, 'password' => $request->password])) {
            $agent = Auth::user();
            $token = $agent->createToken($agent->name)->accessToken;
            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => [
                    'agent_id' => $agent->agent_id,
                    'name' => $agent->name,
                    'email' => $agent->email,
                    'phone' => $agent->phone,
                    'date_of_birth' => $agent->date_of_birth,
                    'address' => $agent->address,
                    'group_one_level' => $agent->group_one_level,
                    'group_two_level' => $agent->group_two_level,
                    'refer_code' => $agent->refer_code,
                    'invited_by' => $agent->invited_by,
                    'token' => $token,
                ]
            ]);
        } else {
            return  response()->json([
                'status' => 500,
                'success' => false,
                'data' => [
                    'message' => 'Login credentials incorrect.'
                ]
            ]);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->AauthAcessToken()->delete();
            return response()->json([
                'status' => 200,
                'success' => true,
                'data' => [
                    'message' => 'Logout Success.'
                ]
            ]);
        }
    }

    public function user()
    {
        $user = Auth::user();
        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => [
                'agent_id' => $user->agent_id,
                'name' => $user->name,
                'email' => $user->email,
                'phone' => $user->phone,
                'date_of_birth' => $user->date_of_birth,
                'address' => $user->address,
                'group_one_level' => $user->group_one_level,
                'group_two_level' => $user->group_two_level,
                'refer_code' => $user->refer_code,
                'invited_by' => $user->invited_by,
            ]
        ]);
    }
}
