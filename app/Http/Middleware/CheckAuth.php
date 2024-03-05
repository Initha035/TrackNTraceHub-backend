<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $accessToken = $request->bearerToken();
        if (!$accessToken) {
            return response()->json(["message" => "Access Denied. Must Provide Valid Token"], 401);
        }
        error_log($accessToken);

        try {
            $decoded = JWT::decode($accessToken, new Key(env('JWT_PRIVATE_KEY'), 'HS256'));

            $request->userinfo = $decoded;
            error_log(json_encode($request->userinfo));
            return $next($request);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json(["message" => "Unauthorized user"], 401);
        }
    }
}
