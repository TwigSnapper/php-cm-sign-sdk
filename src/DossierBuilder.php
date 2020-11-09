<?php

namespace CmSignSdk;

use CmSignSdk\Entity\Dossier;

/**
 * Class DossierBuilder
 * @package CmSignSdk
 */
class DossierBuilder implements DossierBuilderInterface
{
    private $dossier;

    /**
     * DossierBuilder constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->dossier = new Dossier();
        $this->dossier->setName($name);
        $this->setLocale('nl-NL');
    }

    /**
     * @param $locale
     * @return $this
     */
    public function setLocale(string $locale): DossierBuilder
    {
        $this->dossier->setLocale($locale);
        return $this;
    }

    /**
     * minimum: 60
     * maximum: 7776000
     * example: 2592000
     * default: 2592000
     * @param int $seconds
     * @return DossierBuilder
     */
    public function expiresIn(int $seconds): DossierBuilder
    {
        if ($seconds < 60) $seconds = 60;
        if ($seconds > 7776000) $seconds = 7776000;
        $this->dossier->setExpiresIn($seconds);
        return $this;
    }
}