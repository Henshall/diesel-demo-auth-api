<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtAuth
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
        // SET TOKEN AND SECRET KEY
        $jwtClientToken = $request->bearerToken();
        if (!$jwtClientToken) {
            throw new \Exception("NO JWT TOKEN GIVEN", 1);
        }
        $jwtSecretKey = new Key(config("jwt.secret"), 'HS256');
        // DECODE USER
        $user = JWT::decode($jwtClientToken, $jwtSecretKey);
        //' THROW ERROR IF NOT INVALID NOT AUTHENTICATED'
        if (!$user->sub && !$user->name || !$user->password ) {
            throw new \Exception("ERROR - JWT TOKEN IS NOT VALID", 1);
        }
        return $next($request);
    }
}
