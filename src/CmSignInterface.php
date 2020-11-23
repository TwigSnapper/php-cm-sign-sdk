<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\Branding;
use chrissmits91\CmSignSdk\Entity\Client;
use chrissmits91\CmSignSdk\Entity\Dossier;
use chrissmits91\CmSignSdk\Entity\Field;
use chrissmits91\CmSignSdk\Entity\FieldValue;
use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Identification;
use chrissmits91\CmSignSdk\Entity\Invite;
use chrissmits91\CmSignSdk\Entity\Payment;
use chrissmits91\CmSignSdk\Entity\Webhook;

/**
 * Interface CmSignInterface
 * @package CmSignSdk
 */
interface CmSignInterface
{
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
     * @param string $dossierId
     * @param Dossier $dossier
     * @return Dossier
     */
    public function updateDossier(string $dossierId, Dossier $dossier): Dossier;

    /**
     * @param string $dossierId
     * @return Dossier
     */
    public function deleteDossier(string $dossierId): Dossier;

    /**
     * @param Dossier $dossier
     * @param string $type
     * @return mixed
     */
    public function downloadSignedDocument(Dossier $dossier, string $type = 'file');

    /**
     * @param string $dossierId
     * @return Invite[]
     */
    public function listDossierInvites(string $dossierId): array;

    /**
     * @param Dossier $dossier
     * @param int $expiresIn
     * @return Invite[]
     */
    public function createDossierInvites(Dossier $dossier, int $expiresIn = 2592000): array;

    /**
     * @param string $dossierId
     * @param string $inviteId
     * @return Invite
     */
    public function getDossierInvite(string $dossierId, string $inviteId): Invite;

    /**
     * @param string $dossierId
     * @param string $inviteId
     * @return Invite
     */
    public function deleteDossierInvite(string $dossierId, string $inviteId): Invite;

    /**
     * @param string $dossierId
     * @param string $fieldId
     * @return FieldValue
     */
    public function getDossierFieldValue(string $dossierId, string $fieldId): FieldValue;

    /**
     * @param string $documentPath
     * @return File
     */
    public function uploadDocument(string $documentPath): File;

    /**
     * @param string $dossierId
     * @param string $inviteeId
     * @return Identification[]
     */
    public function listInviteeIdentifications(string $dossierId, string $inviteeId): array;

    /**
     * @param string $dossierId
     * @param string $inviteeId
     * @return Payment[]
     */
    public function listInviteePayments(string $dossierId, string $inviteeId): array;

    /**
     * @param Client $client
     * @return Client
     */
    public function createClient(Client $client): Client;

    /**
     * @return array
     */
    public function listClients(): array;

    /**
     * @param string $kid
     * @return Client
     */
    public function getClient(string $kid): Client;

    /**
     * @param string $kid
     * @param Client $client
     * @return Client
     */
    public function updateClient(string $kid, Client $client): Client;

    /**
     * @param string $kid
     * @param Webhook $webhook
     * @return Webhook
     */
    public function createWebhook(string $kid, Webhook $webhook): Webhook;

    /**
     * @param string $kid
     * @return Webhook[]
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
     * @param string $path
     * @param string $documentId
     * @return Field[]
     */
    public function parseDocumentFieldsFile(string $path, string $documentId);
}