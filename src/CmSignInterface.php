<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\Branding;
use chrissmits91\CmSignSdk\Entity\Dossier;
use chrissmits91\CmSignSdk\Entity\Field;
use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Webhook;

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
     * @param string $dossierId
     * @return Dossier
     */
    public function getDossier(string $dossierId): Dossier;

    /**
     * @param Dossier $dossier
     * @param int $expiresIn
     * @return mixed
     */
    public function sendInvites(Dossier $dossier, int $expiresIn = 2592000): array;

    /**
     * @param string $kid
     * @return Branding
     */
    public function getBranding(string $kid): Branding;

    /**
     * @param string $kid
     * @param Branding $branding
     * @return mixed
     */
    public function setBranding(string $kid, Branding $branding): Branding;

    /**
     * @param string $kid
     * @param Webhook $webhook
     * @return Webhook
     */
    public function createWebhook(string $kid, Webhook $webhook): Webhook;

    /**
     * @param string $kid
     * @return array
     */
    public function listWebhooks(string $kid): array;

    /**
     * @param string $kid
     * @param string $webhookId
     * @return Webhook
     */
    public function getWebhook(string $kid, string $webhookId): Webhook;

    /**
     * @param string $kid
     * @param string $webhookId
     * @param Webhook $webhook
     * @return Webhook
     */
    public function updateWebhook(string $kid, string $webhookId, Webhook $webhook): Webhook;

    /**
     * @param string $kid
     * @param string $webhookId
     * @return Webhook
     */
    public function deleteWebhook(string $kid, string $webhookId): Webhook;
}