<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Invitee;
use chrissmits91\CmSignSdk\Entity\Owner;

/**
 * Interface DossierBuilderInterface
 * @package CmSignSdk
 */
interface DossierBuilderInterface
{
    /**
     * @param string $locale
     * @return DossierBuilder
     */
    public function setLocale(string $locale): DossierBuilder;

    /**
     * @param int $seconds
     * @return DossierBuilder
     */
    public function expiresIn(int $seconds): DossierBuilder;

    /**
     * @param int $seconds
     * @return DossierBuilder
     */
    public function reminderIn(int $seconds): DossierBuilder;

    /**
     * @param Owner[] $owners
     * @return mixed
     */
    public function addOwners(array $owners): DossierBuilder;

    /**
     * @param File[] $files
     * @return DossierBuilder
     */
    public function addFiles(array $files): DossierBuilder;

    /**
     * @param Invitee[] $invitees
     * @return DossierBuilder
     */
    public function addInvitees(array $invitees): DossierBuilder;
}