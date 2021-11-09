<?php


namespace App\Actions\Auth;


use App\Traits\HttpResponse;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginAction
{
    use HttpResponse;

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke($credentials): JsonResponse
    {
        if (! $token = JWTAuth::attempt($credentials)) {
            return $this->error('unauthenticated')->respond(JsonResponse::HTTP_UNAUTHORIZED);
        }

        return $this->generateToken($token);
    }

    /**
     * @param $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => JWTAuth::factory()->getTTL(),
        ]);
    }
}
