<?php

namespace App\Actions\Auth;

use App\Models\User;
use App\Traits\HttpResponse;
use App\Transformers\ProfileTransformer;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;
use Tymon\JWTAuth\Facades\JWTAuth;

class HandleSocialCallbackAction
{
    public function  __invoke($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

        $userCreated = User::firstOrCreate(
            [
                'name' => $user->name,
            ],
            [
                'email' => ($user->email || ''),
                'password' => '',
            ]
        );

        return response()->json([
            'access_token' =>  JWTAuth::fromUser($userCreated),
            'token_type'   => 'bearer',
            'expires_in'   => JWTAuth::factory()->getTTL(),
        ]);
    }
}
