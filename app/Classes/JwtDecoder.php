<?php 

namespace App\Classes;

use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Firebase\JWT\Key;

class JwtDecoder
{
    static function decode($jwtClientToken){
        if (!$jwtClientToken) {
            throw new \Exception("NO JWT TOKEN GIVEN", 1);
        }
        $jwk = config("jwt.jwk");
        $pem = JWK::parseKey($jwk);
        $keyObject = new Key($pem, 'RS256');
        $user = JWT::decode($jwtClientToken, $keyObject );
        //' THROW ERROR IF NOT INVALID NOT AUTHENTICATED'
        if (!$user->client_id && !$user->jti || !$user->username ) {
            throw new \Exception("ERROR - JWT TOKEN IS NOT VALID", 1);
        }
        return $user;
    }
}

 ?>