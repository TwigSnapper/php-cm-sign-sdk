<?php

namespace CmSignSdk;

interface CmAuthTokenInterface
{
    public function createToken(string $keyId, string $secret, int $expiresAfter = 60): string;
}