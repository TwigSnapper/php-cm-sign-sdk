<?php

use CmSignSdk\DossierBuilder;
use CmSignSdk\Entity\Field;
use CmSignSdk\Entity\FieldLocation;
use CmSignSdk\Entity\File;
use CmSignSdk\Entity\Invitee;
use CmSignSdk\Entity\Owner;
use PHPUnit\Framework\TestCase;

class DossierBuilderTest extends TestCase
{
    public function testDossierBuilder()
    {
        $expected = '{"name":"Example Dossier","locale":"nl-NL","files":[{"id":"1234-0987-abcd-qwer","name":"Example Dossier v12"}],"owners":[{"name":"Joe","email":"joe@example.com","cc":false}],"invitees":[{"name":"Jane","email":"jane@example.com","locale":"nl-NL","position":1,"identificationMethods":null,"phoneNumber":"+31612345678","readOnly":false,"redirectUrl":null,"fields":[{"type":"text","file":"1234-0987-abcd-qwer","tag":null,"tagRequired":true,"locations":[{"range":"1","x":0,"y":0,"width":100,"height":5}]}]}]}';

        $file = new File();
        $file
            ->setId('1234-0987-abcd-qwer')
            ->setName('Example Dossier v12');

        $sut = new DossierBuilder('Example Dossier');
        $sut->expiresIn(123456)
            ->addOwners([
                new Owner('Joe', 'joe@example.com')
            ])
            ->addFiles([$file])
            ->addInvitees([
                new Invitee('Jane', 'jane@example.com', '+31612345678', [
                    new Field('text', '1234-0987-abcd-qwer', [new FieldLocation(0, 0, 100, 5)])
                ])
            ]);

        $this->assertEquals($expected, $sut->getJson());
    }
}
