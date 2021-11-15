<?php

namespace App\Actions\Auth;

use App\Traits\HttpResponse;
use App\Transformers\ProfileTransformer;
use Illuminate\Http\JsonResponse;
use Laravel\Socialite\Facades\Socialite;

class ValidateProviderAction
{
    public function  __invoke($provider)
    {
        $providers = ['facebook', 'google', 'line'];

        if(!in_array($provider, $providers)) {
            return response()->json(['error' => 'Please login using Facebook, Line or Google'], 422);
        }

        return Socialite::driver($provider)->redirect();
    }
}
