<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class SocialiteController extends Controller
{
    public function handleProviderCallback(Request $request)
    {
        $validator = Validator::make($request->only('provider', 'id_token'), [
            'provider' => ['required', 'string'],
            'id_token' => ['required', 'string']
        ]);
        if ($validator->fails())
            return response()->json($validator->errors(), 400);
        $provider = $request->provider;
        $validated = $this->validateProvider($provider);
        if (!is_null($validated))
            return $validated;
        $providerUser = Socialite::driver($provider)->userFromToken($request->id_token);
        $user = User::firstOrCreate(
            [
                'email' => $providerUser->getEmail()
            ],
            [
                'name' => $providerUser->getName(),
                'provider' => $provider
            ]
        );
        $data =  [
            'token' => $user->createToken("access_token_{$request->provider}")->plainTextToken,
            'user' => $user,
        ];
        return response()->json($data, 200);
    }

    protected function validateProvider($provider)
    {
        if (!in_array($provider, ['google'])) {
            return response()->json(["message" => 'You can only login via google account'], 400);
        }
    }
}
