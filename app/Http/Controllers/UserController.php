<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {

        $fields = $request->validate(
            [
                'email' => "required|email|unique:users",
                'password' => 'required|string|confirmed|min:6',
                'name' => "required|string|max:255",
                'is_volunteer' => 'boolean'
            ]
        );
        $user = User::create([
            'name' => $fields['name'],
            // Encrypted password.
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'is_volunteer' => $fields['is_volunteer']
        ]);
        $user = $user->makeHidden(['password']);
        $token = JWT::encode($user->toArray(), env('JWT_PRIVATE_KEY'), 'HS256');
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }


    // Login method
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();


        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $user = $user->makeHidden(['password']);
        $token = JWT::encode($user->toArray(), env('JWT_PRIVATE_KEY'), 'HS256');
        $response = [
            'user' => $user,
            'token' => $token,
        ];
        return response($response, 201);
    }

    public function changepassword(Request $request)
    {
        $user = $request->userinfo;
        $fields = $request->validate(
            [
                "oldpassword" => "required|string",
                "password" => "required|string|confirmed|min:6"
            ]
        );
        $user = User::find($user->id);
        // Check password
        if (!$user || !Hash::check($fields['oldpassword'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }
        $user->update(
            ['password' => bcrypt($fields['password'])]
        );
        $user->save();
        return ["success" => true];
    }
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }
}
