<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\Branding;
use chrissmits91\CmSignSdk\Entity\Client;
use chrissmits91\CmSignSdk\Entity\Dossier;
use chrissmits91\CmSignSdk\Entity\Field;
use chrissmits91\CmSignSdk\Entity\FieldLocation;
use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Identification;
use chrissmits91\CmSignSdk\Entity\Invite;
use chrissmits91\CmSignSdk\Entity\Payment;
use chrissmits91\CmSignSdk\Entity\Webhook;
use Exception;
use JsonMapper;
use JsonMapper_Exception;
use Spatie\SimpleExcel\SimpleExcelReader;

/**
 * Class CmSign
 * @package CmSignSdk
 */
class CmSign implements CmSignInterface
{
    /**
     * @var string
     */
    protected string $url;

    /**
     * @var string
     */
    protected string $token;

    /**
     * CmSignSdk constructor.
     * @param string $url
     * @param string $token
     */
    public function __construct(string $url, string $token)
    {
        $this->url = $url;
        $this->token = $token;
    }

    /**
     * @param Dossier $dossier
     * @param string $type
     * @return mixed
     * @throws ErrorResponse
     */
    public function downloadDocument(Dossier $dossier, string $type = 'file')
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $request->get($this->url . 'dossiers/' . $dossier->getId() . '/download', [
            'type' => $type
        ], true);
    }

    /**
     * @param File $file
     * @param string $json
     * @param string $redirectUrl
     * @return array|Entity\Dossier
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function createDossier(File $file, string $json, string $redirectUrl): Dossier
    {
        $request = new CmHttp();
        $request->setHeaders([
            'Authorization: Bearer ' . $this->token,
            'Content-Type: application/json'
        ]);

        return $this->mapToEntity(
            $request->post($this->url . 'dossiers', $json),
            new Dossier()
        );
    }

    /**
     * @param string $dossierId
     * @return Dossier
     * @throws JsonMapper_Exception|ErrorResponse
     */
    public function getDossier(string $dossierId): Dossier
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntity(
            $request->get($this->url . 'dossiers/' . $dossierId),
            new Dossier()
        );
    }

    /**
     * @param string $documentPath
     * @return File
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function uploadDocument(string $documentPath): File
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        $filePath = curl_file_create($documentPath);
        $data = [
            'file' => $filePath
        ];

        return $this->mapToEntity(
            $request->post($this->url . 'upload', $data),
            new File()
        );
    }

    /**
     * @param string $path
     * @param string $documentId
     * @return Field[]
     * @throws Exception
     */
    public function parseDocumentFieldsFile(string $path, string $documentId)
    {
        $fields = [];

        $rows = SimpleExcelReader::create($path)->getRows()->all();
        $rowsGroupedByName = [];
        foreach ($rows as $row) {
            if (empty($row['name']) ||
                empty($row['type']) ||
                empty($row['x']) ||
                empty($row['y']) ||
                empty($row['width']) ||
                empty($row['height']) ||
                empty($row['page'])) {
                throw new Exception("{$row['name']} has an empty cell");
            }
            if (!isset($rowsGroupedByName[$row['name']])) {
                $rowsGroupedByName[$row['name']] = [];
            }
            $rowsGroupedByName[$row['name']][] = $row;
        }

        foreach ($rowsGroupedByName as $group) {
            $fieldLocations = [];
            $fieldType = '';
            foreach ($group as $item) {
                $fieldType = $item['type'];
                $fieldLocations[] = new FieldLocation(
                    (int)$item['x'],
                    (int)$item['y'],
                    (int)$item['width'],
                    (int)$item['height'],
                    $item['page']
                );
            }
            $row = new Field($fieldType, $documentId, $fieldLocations);
            $fields[] = $row;
        }

        return $fields;
    }

    /**
     * @param Dossier $dossier
     * @param int $expiresIn
     * @return Invite[]
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function sendInvites(Dossier $dossier, int $expiresIn = 2592000): array
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = [];
        foreach ($dossier->getInvitees() as $invitee) {
            $data[] = [
                'inviteeId' => $invitee->getId(),
                'expiresIn' => $expiresIn
            ];
        }

        return $this->mapToEntities(
            $request->post($this->url . 'dossiers/' . $dossier->getId() . '/invites', json_encode($data)),
            Invite::class
        );
    }

    /**
     * @param string $dossierId
     * @param string $inviteeId
     * @return Identification[]
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function getInviteeIdentifications(string $dossierId, string $inviteeId): array
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntities(
            $request->get($this->url . 'dossiers/' . $dossierId . '/invitees/' . $inviteeId . '/identifications'),
            Identification::class
        );
    }

    /**
     * @param string $dossierId
     * @param string $inviteeId
     * @return Payment[]
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function getInviteePayments(string $dossierId, string $inviteeId): array
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntities(
            $request->get($this->url . 'dossiers/' . $dossierId . '/invitees/' . $inviteeId . '/payments'),
            Payment::class
        );
    }

    /**
     * @param Client $client
     * @return Client
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function createClient(Client $client): Client
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = json_encode($client);

        return $this->mapToEntity(
            $request->post($this->url . 'clients', $data),
            Client::class
        );
    }

    /**
     * @return array
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function listClients(): array
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntities(
            $request->get($this->url . 'clients'),
            Client::class
        );
    }

    /**
     * @param string $kid
     * @return Client
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function getClient(string $kid): Client
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntity(
            $request->get($this->url . 'clients/' . $kid),
            Client::class
        );
    }

    /**
     * @param string $kid
     * @param Client $client
     * @return Client
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function updateClient(string $kid, Client $client): Client
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = json_encode($client);

        return $this->mapToEntity(
            $request->put($this->url . 'clients/' . $kid, $data),
            Client::class
        );
    }

    /**
     * @param string $kid
     * @param Webhook $webhook
     * @return Webhook
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function createWebhook(string $kid, Webhook $webhook): Webhook
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = json_encode($webhook);

        return $this->mapToEntity(
            $request->post($this->url . 'clients/' . $kid . '/webhooks', $data),
            Webhook::class
        );
    }

    /**
     * @param string $kid
     * @return array
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function listWebhooks(string $kid): array
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntities(
            $request->get($this->url . 'clients/' . $kid . '/webhooks'),
            Webhook::class
        );
    }

    /**
     * @param string $kid
     * @param string $webhookId
     * @return Webhook
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function getWebhook(string $kid, string $webhookId): Webhook
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntity(
            $request->get($this->url . 'clients/' . $kid . '/webhooks/' . $webhookId),
            Webhook::class
        );
    }

    /**
     * @param string $kid
     * @param string $webhookId
     * @param Webhook $webhook
     * @return Webhook
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function updateWebhook(string $kid, string $webhookId, Webhook $webhook): Webhook
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = json_encode($webhook);

        return $this->mapToEntity(
            $request->put($this->url . 'clients/' . $kid . '/webhooks', $data),
            Webhook::class
        );
    }

    /**
     * @param string $kid
     * @param string $webhookId
     * @return Webhook
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function deleteWebhook(string $kid, string $webhookId): Webhook
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntity(
            $request->delete($this->url . 'clients/' . $kid . '/webhooks/' . $webhookId),
            Webhook::class
        );
    }

    /**
     * @param string $kid
     * @return Branding
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function getBranding(string $kid): Branding
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token]);

        return $this->mapToEntity(
            $request->get($this->url . 'clients/' . $kid . '/branding'),
            Branding::class
        );
    }

    /**
     * @param string $kid
     * @param Branding $branding
     * @return mixed
     * @throws JsonMapper_Exception
     * @throws ErrorResponse
     */
    public function setBranding(string $kid, Branding $branding): Branding
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = json_encode($branding);

        return $this->mapToEntity(
            $request->post($this->url . 'clients/' . $kid . '/branding', $data),
            Branding::class
        );
    }

    /**
     * @param $data
     * @param $entity
     * @return mixed|object
     * @throws JsonMapper_Exception
     */
    public function mapToEntity($data, $entity)
    {
        $mapper = new JsonMapper();
        return $mapper->map($data, $entity);
    }

    /**
     * @param $data
     * @param $entity
     * @return array
     * @throws JsonMapper_Exception
     */
    public function mapToEntities($data, $entity): array
    {
        $mapper = new JsonMapper();
        return $mapper->mapArray($data, [], $entity);
    }
}