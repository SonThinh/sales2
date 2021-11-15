<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\HandleSocialCallbackAction;
use App\Actions\Auth\ValidateProviderAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Actions\Auth\LoginAction;
use Tymon\JWTAuth\Facades\JWTAuth;

class SocialLoginController extends Controller
{

    public function redirectToSocial($provider, Request $request, ValidateProviderAction $validateAction, HandleSocialCallbackAction $handleAction)
    {
        $params = ['state','scope'];

        if($request->has($params)) {
            return ($handleAction)($provider);
        }

        return ($validateAction)($provider);
    }

    public function redirectToLine($provider, HandleSocialCallbackAction $handleAction)
    {
        return ($handleAction)($provider);
    }

}
