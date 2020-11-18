<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\Dossier;
use chrissmits91\CmSignSdk\Entity\Field;
use chrissmits91\CmSignSdk\Entity\File;

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
     * @param string $path
     * @param string $documentId
     * @return Field[]
     */
    public function parseDocumentFieldsFile(string $path, string $documentId);

    /**
     * @param Dossier $dossier
     * @param string $type
     * @return mixed
     */
    public function downloadDocument(Dossier $dossier, string $type = 'file');

    /**
     * @param File $file
     * @param string $json
     * @param string $redirectUrl
     * @return Dossier
     */
    public function createDossier(File $file, string $json, string $redirectUrl): Dossier;

    /**
     * @param Dossier $dossier
     * @param int $expiresIn
     * @return mixed
     */
    public function sendInvites(Dossier $dossier, int $expiresIn = 2592000);
}