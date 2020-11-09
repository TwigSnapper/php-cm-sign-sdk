<?php

namespace CmSignSdk;

use CmSignSdk\Entity\Dossier;
use CmSignSdk\Entity\File;
use CmSignSdk\Entity\Invite;
use JsonMapper;
use JsonMapper_Exception;

/**
 * Class CmSign
 * @package CmSignSdk
 */
class CmSign implements CmSignInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $token;

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
     * @param File $file
     * @param string $json
     * @param string $redirectUrl
     * @return array|Entity\Dossier
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
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
     * @param Dossier $dossier
     * @param $invitees
     * @return array|mixed
     * @throws ErrorResponse
     * @throws JsonMapper_Exception
     */
    public function sendInvites(Dossier $dossier, $invitees)
    {
        $request = new CmHttp();
        $request->setHeaders(['Authorization: Bearer ' . $this->token, 'Content-Type: application/json']);

        $data = [];
        foreach ($invitees as $invitee) {
            $data[] = [
                'inviteeId' => $invitee['id'],
                'expiresIn' => 2592000
            ];
        }

        return $this->mapToEntity(
            $request->post($this->url . 'dossiers/' . $dossier->getId() . '/invites', json_encode($data)),
            new Invite()
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