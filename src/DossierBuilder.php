<?php

namespace chrissmits91\CmSignSdk;

use CmSignSdk\Entity\Dossier;
use CmSignSdk\Entity\File;
use CmSignSdk\Entity\Invitee;
use CmSignSdk\Entity\Owner;

/**
 * Class DossierBuilder
 * @package CmSignSdk
 */
class DossierBuilder implements DossierBuilderInterface
{
    /**
     * @var Dossier
     */
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
     * @return string
     */
    public function getJson(): string
    {
        return json_encode($this->dossier);
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
     * minimum: 60          1 min
     * maximum: 7776000     90 days
     * example: 2592000     30 days
     * default: 2592000     30 days
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

    /**
     * minimum: 86400       1 day
     * maximum: 7776000     90 days
     * example: 604800      7 days
     * @param int $seconds
     * @return DossierBuilder
     */
    public function reminderIn(int $seconds): DossierBuilder
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
    public function addOwners(array $owners): DossierBuilder
    {
        $this->dossier->setOwners(array_merge(
            $this->dossier->getOwners(),
            $owners
        ));

        return $this;
    }

    /**
     * @param File[] $files
     * @return DossierBuilder
     */
    public function addFiles(array $files): DossierBuilder
    {
        $this->dossier->setFiles(array_merge(
            $this->dossier->getFiles(),
            $files
        ));

        return $this;
    }

    /**
     * @param Invitee[] $invitees
     * @return DossierBuilder
     */
    public function addInvitees(array $invitees): DossierBuilder
    {
        $this->dossier->setInvitees(array_merge(
            $this->dossier->getInvitees(),
            $invitees
        ));

        return $this;
    }
}