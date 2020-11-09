<?php

use CmSignSdk\CmSign;
use CmSignSdk\Entity\Dossier;
use CmSignSdk\Entity\File;
use CmSignSdk\Entity\Invite;
use PHPUnit\Framework\TestCase;

class CmSignTest extends TestCase
{
    public function testMapToEntity()
    {
        $sut = new CmSign('', '');

        $exampleJson = '{"id":"8d817359-7eb8-4b6e-9030-17ac286b7dc0","name":"Purchase contract 2019 v12","hash":"string","uploadDateTime":"2020-11-09T14:29:03.861Z","contentType":"application/pdf"}';
        $exampleObject = json_decode($exampleJson);
        /** @var File $file */
        $file = $sut->mapToEntity($exampleObject, new File());

        $this->assertEquals('8d817359-7eb8-4b6e-9030-17ac286b7dc0', $file->getId());
        $this->assertEquals('Purchase contract 2019 v12', $file->getName());
        $this->assertEquals('string', $file->getHash());
        $this->assertEquals('2020-11-09T14:29:03.861Z', $file->getUploadDateTime());
        $this->assertEquals('application/pdf', $file->getContentType());
    }

    public function testMapToEntityWithNestedEntities()
    {
        $sut = new CmSign('', '');

        $exampleJson = '{"id":"22470767-904e-4553-9586-d7ed4f2b330e","name":"2019 Purchase contract","owners":[{"id":"c2b0ff41-f97a-421d-a4eb-85b158a2de2a","name":"Mike Dossierowner","email":"user@example.com","cc":false}],"files":[{"id":"8d817359-7eb8-4b6e-9030-17ac286b7dc0","name":"Purchase contract 2019 v12","hash":"string","uploadDateTime":"2020-11-09T15:23:05.375Z","contentType":"application/pdf"}],"invitees":[{"id":"c6f7eb6f-7414-4f5e-9096-85c6c5a48f84","name":"Peter Invitee","email":"user@example.com","locale":"en-US","position":1,"identificationMethods":["idin"],"payments":[{"amount":100,"currency":"EUR"}],"phoneNumber":"+31601234567,","reference":"6c38955e-7324-41e7-97dd-0bcf55e275e2","readOnly":false,"state":"approved","stateComment":null,"redirectUrl":"string","fields":[{"id":"50ee1534-6172-4228-84e8-653c6f65eaf0","type":"signature","file":"8d817359-7eb8-4b6e-9030-17ac286b7dc0","tag":"{signature1}","tagRequired":true,"locations":[{"range":"1","x":0,"y":0,"width":0,"height":0}],"invitee":"c6f7eb6f-7414-4f5e-9096-85c6c5a48f84"}]}]}';
        $exampleObject = json_decode($exampleJson);

        /** @var Dossier $dossier */
        $dossier = $sut->mapToEntity($exampleObject, new Dossier());

        $this->assertEquals('2019 Purchase contract', $dossier->getName());

        $this->assertCount(1, $dossier->getFiles());
        $this->assertEquals('Purchase contract 2019 v12', $dossier->getFiles()[0]->getName());

        $this->assertCount(1, $dossier->getOwners());
        $this->assertEquals('Mike Dossierowner', $dossier->getOwners()[0]->getName());

        $this->assertCount(1, $dossier->getInvitees());
        $this->assertEquals('Peter Invitee', $dossier->getInvitees()[0]->getName());

        $this->assertCount(1, $dossier->getInvitees()[0]->getPayments());
        $this->assertEquals(100, $dossier->getInvitees()[0]->getPayments()[0]->getAmount());
        $this->assertEquals('EUR', $dossier->getInvitees()[0]->getPayments()[0]->getCurrency());

        $this->assertCount(1, $dossier->getInvitees()[0]->getFields());
        $this->assertCount(1, $dossier->getInvitees()[0]->getFields()[0]->getLocations());
    }

    public function testMapToEntityWithArrayOfEntities()
    {
        $sut = new CmSign('', '');

        $exampleJson = '[{"id": "test0", "email": "string"}, {"id": "test1", "email": "string"}, {"id": "test2", "email": "string"}]';
        $exampleObject = json_decode($exampleJson);

        $invites = $sut->mapToEntities($exampleObject, Invite::class);

        $this->assertCount(3, $invites);

        foreach ($invites as $key => $invite) {
            $this->assertEquals('test' . $key, $invite->getId());
        }
    }
}
