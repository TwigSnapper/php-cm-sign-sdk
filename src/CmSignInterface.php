<?php

namespace chrissmits91\CmSignSdk;

use CmSignSdk\Entity\Dossier;
use CmSignSdk\Entity\File;

/**
 * Interface CmSignInterface
 * @package CmSignSdk
 */
interface CmSignInterface
{
    /**
     * @param string $documentPath
     * @return File
     */
    public function uploadDocument(string $documentPath): File;

    /**
     * @param File $file
     * @param string $json
     * @param string $redirectUrl
     * @return Dossier
     */
    public function createDossier(File $file, string $json, string $redirectUrl): Dossier;

    /**
     * @param Dossier $dossier
     * @return mixed
     */
    public function sendInvites(Dossier $dossier);
}