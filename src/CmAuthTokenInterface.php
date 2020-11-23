<?php

namespace TwigSnapper\CmSignSdk;

/**
 * Interface CmAuthTokenInterface
 * @package CmSignSdk
 */
interface CmAuthTokenInterface
{
    /**
     * @param string $keyId
     * @param string $secret
     * @param int $expiresAfter
     * @return string
     */
    public function createToken(string $keyId, string $secret, int $expiresAfter = 60): string;
}