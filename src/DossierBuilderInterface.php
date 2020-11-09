<?php

namespace CmSignSdk;

interface DossierBuilderInterface
{
    public function setLocale(string $locale): DossierBuilder;
    public function expiresIn(int $seconds): DossierBuilder;
}