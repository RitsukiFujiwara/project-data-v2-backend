<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validateチェック
        $validator = Validator::make($request->only(["email", "password"]), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        // validate失敗した場合
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // トークンチェック
        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return response()->json(['token' => $token]);
    }

    public function register(Request $request)
    {
        // validateチェック
        $validator = Validator::make($request->only(["name", "email", "password", "password_confirmation"]), [
            'name' => 'required|max:10|unique:users',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|string|min:6|max:30',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        User::create(array_merge(
            $validator->validated(),
            ['password' => bcrypt($request->password)]
        ));

        return response()->json([
            'message' => 'success'
        ], 201);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'success']);
    }

    public function refresh()
    {
        $token = auth()->refresh();
        return response()->json(['token' => $token]);
    }
}
