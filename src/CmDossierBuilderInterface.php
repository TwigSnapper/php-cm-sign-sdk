<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Invitee;
use chrissmits91\CmSignSdk\Entity\Owner;

/**
 * Interface DossierBuilderInterface
 * @package CmSignSdk
 */
interface CmDossierBuilderInterface
{
    /**
     * @param string $locale
     * @return CmDossierBuilder
     */
    public function setLocale(string $locale): CmDossierBuilder;

    /**
     * @param int $seconds
     * @return CmDossierBuilder
     */
    public function expiresIn(int $seconds): CmDossierBuilder;

    /**
     * @param int $seconds
     * @return CmDossierBuilder
     */
    public function reminderIn(int $seconds): CmDossierBuilder;

    /**
     * @param Owner[] $owners
     * @return mixed
     */
    public function addOwners(array $owners): CmDossierBuilder;

    /**
     * @param File[] $files
     * @return CmDossierBuilder
     */
    public function addFiles(array $files): CmDossierBuilder;

    /**
     * @param Invitee[] $invitees
     * @return CmDossierBuilder
     */
    public function addInvitees(array $invitees): CmDossierBuilder;
}