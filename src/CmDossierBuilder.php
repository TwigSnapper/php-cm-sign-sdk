<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\Dossier;
use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Invitee;
use chrissmits91\CmSignSdk\Entity\Owner;

/**
 * Class DossierBuilder
 * @package CmSignSdk
 */
class CmDossierBuilder implements CmDossierBuilderInterface
{
    /**
     * @var Dossier
     */
    private Dossier $dossier;

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
     * @return string
     */
    public function getJson(): string
    {
        $json = json_encode($this->dossier);
        return preg_replace('/,\s*"[^"]+":null|"[^"]+":null,?/', '', $json);
    }

    /**
     * @param $locale
     * @return $this
     */
    public function setLocale(string $locale): CmDossierBuilder
    {
        $this->dossier->setLocale($locale);
        return $this;
    }

    /**
     * minimum: 60          1 min
     * maximum: 7776000     90 days
     * example: 2592000     30 days
     * default: 2592000     30 days
     * @param int $seconds
     * @return CmDossierBuilder
     */
    public function expiresIn(int $seconds): CmDossierBuilder
    {
        if ($seconds < 60) $seconds = 60;
        if ($seconds > 7776000) $seconds = 7776000;
        $this->dossier->setExpiresIn($seconds);
        return $this;
    }

    /**
     * minimum: 86400       1 day
     * maximum: 7776000     90 days
     * example: 604800      7 days
     * @param int $seconds
     * @return CmDossierBuilder
     */
    public function reminderIn(int $seconds): CmDossierBuilder
    {
        if ($seconds < 86400) $seconds = 86400;
        if ($seconds > 7776000) $seconds = 7776000;
        $this->dossier->setReminderIn($seconds);
        return $this;
    }

    /**
     * @param Owner[] $owners
     * @return mixed
     */
    public function addOwners(array $owners): CmDossierBuilder
    {
        $this->dossier->setOwners(array_merge(
            $this->dossier->getOwners(),
            $owners
        ));

        return $this;
    }

    /**
     * @param File[] $files
     * @return CmDossierBuilder
     */
    public function addFiles(array $files): CmDossierBuilder
    {
        $this->dossier->setFiles(array_merge(
            $this->dossier->getFiles(),
            $files
        ));

        return $this;
    }

    /**
     * @param Invitee[] $invitees
     * @return CmDossierBuilder
     */
    public function addInvitees(array $invitees): CmDossierBuilder
    {
        $this->dossier->setInvitees(array_merge(
            $this->dossier->getInvitees(),
            $invitees
        ));

        return $this;
    }
}