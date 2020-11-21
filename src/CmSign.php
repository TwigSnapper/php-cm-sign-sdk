<?php

namespace chrissmits91\CmSignSdk;

use chrissmits91\CmSignSdk\Entity\Dossier;
use chrissmits91\CmSignSdk\Entity\Field;
use chrissmits91\CmSignSdk\Entity\FieldLocation;
use chrissmits91\CmSignSdk\Entity\File;
use chrissmits91\CmSignSdk\Entity\Invite;
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
     * @param Dossier $dossier
     * @param int $expiresIn
     * @return Invite[]
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function sendInvites(Dossier $dossier, int $expiresIn = 2592000)
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
    public function mapToEntities($data, $entity)
    {
        $mapper = new JsonMapper();
        return $mapper->mapArray($data, [], $entity);
    }
}