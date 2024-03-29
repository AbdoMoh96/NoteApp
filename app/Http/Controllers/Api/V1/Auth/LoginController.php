<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->only('email', 'password'), [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:255', 'string'],
        ]);

        if ($validator->fails())
            return response()->json($validator->errors(), 400);

        $user = User::where('email', $request->email)->first();

        if($user){
            if(empty($user->password) && $user->provider !== 'credentials')
                return response()->json("please login using google account", 401);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $data =  [
                    'token' => $user->createToken('access_token')->plainTextToken,
                    'user' => $user,
                ];
                return response()->json($data, 200);
            }
        }

        return response()->json("these credentials don't match our records", 401);
    }
}
