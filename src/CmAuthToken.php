<?php

namespace CmSignSdk;

use Firebase\JWT\JWT;

/**
 * Class CmAuthToken
 * @package CmSignSdk
 */
class CmAuthToken implements CmAuthTokenInterface
{
    /**
     * @param string $keyId
     * @param string $secret
     * @param int $expiresAfter
     * @return string
     */
    public function createToken(string $keyId, string $secret, int $expiresAfter = 60): string
    {
        $issuedAt = time();
        $notBefore = $issuedAt + 10; // Adding 10 seconds
        $expiresAt = $notBefore + $expiresAfter; // Adding 60 seconds
        $data = [
            'iat' => $issuedAt, // Issued at: time when the token was generated
            'nbf' => $notBefore, // Not before
            'exp' => $expiresAt, // Expire
        ];

        return JWT::encode($data, $secret, 'HS256', $keyId);
    }
}