<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->only('name', 'email', 'password', 'password_confirmation'), [
            'name' => ['required', 'min:2', 'max:50', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'max:255', 'confirmed', 'string'],
        ]);
        if ($validator->fails())
            return response()->json($validator->errors(), 400);
        $input = $request->only('name', 'email', 'password');
        $input['password'] = Hash::make($request['password']);
        $user = User::create($input);
        $data =  [
            'token' => $user->createToken('access_token')->plainTextToken,
            'user' => $user,
        ];
        return response()->json($data, 200);
    }

}
