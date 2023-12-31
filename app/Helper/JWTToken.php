<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken
{
    public static function generateToken($userEmail, $userID): string
    {
        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'pos-token',
            'iat' => time(),
            'exp' => time() + 60 * 60*6,
            'userEmail' => $userEmail,
            'userID' => $userID
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        return $token;
    }

    public static function generateTokenforPassword($userEmail): string
    {
        $key = env('JWT_KEY');

        $payload = [
            'iss' => 'pos-token',
            'iat' => time(),
            'exp' => time() + 60 * 3,
            'userEmail' => $userEmail,
            'userID' => '0'
        ];
        $token = JWT::encode($payload, $key, 'HS256');
        return $token;
    }
    public static function verifyToken($token): string|object
    {

        try {
            if ($token==null) {

                return 'unauthorized';
            }
            else{
                $key = env('JWT_KEY');
                $decode = JWT::decode($token, new Key($key, 'HS256'));
                return $decode;
            }

        } catch (Exception $e) {
            return 'unauthorized';
        }
    }
}


/*MAIL_MAILER=smtp
MAIL_HOST=mail.teamrabbil.com
MAIL_PORT=25
MAIL_USERNAME=info@teamrabbil.com
MAIL_PASSWORD=~sR4[bhaC[Qs
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="info@teamrabbil.com"
MAIL_FROM_NAME="${APP_NAME}"
*/