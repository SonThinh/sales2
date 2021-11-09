<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\LoginAction;
use App\Actions\Auth\LogoutAction;
use App\Actions\Auth\RefreshTokenAction;
use App\Actions\Auth\ShowProfileAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param LoginAction $action
     *
     * @return JsonResponse
     */
    public function login(Request $request, LoginAction $action): JsonResponse
    {
        return ($action)($request->only('email', 'password'));
    }

    /**
     * @param LogoutAction $action
     *
     * @return JsonResponse
     */
    public function logout(LogoutAction $action): JsonResponse
    {
        return ($action)();
    }

    public function refresh(RefreshTokenAction $action): JsonResponse
    {
        return ($action)();
    }

    /**
     * @param ShowProfileAction $action
     *
     * @return JsonResponse
     */
    public function me(ShowProfileAction $action): JsonResponse
    {
        return ($action)();
    }
}
