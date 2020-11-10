<?php

namespace chrissmits91\CmSignSdk\Entity;

use JsonSerializable;

/**
 * Class Invitee
 * @package CmSignSdk\Entity
 */
class Invitee implements JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var int
     */
    private $position = 1;

    /**
     * @var string[]
     */
    private $identificationMethods;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $reference;

    /**
     * @var boolean
     */
    private $readOnly = false;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $stateComment;

    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * @var Field[]
     */
    private $fields;

    /**
     * Invitee constructor.
     * @param $name
     * @param $email
     * @param $phoneNumber
     * @param array $fields
     */
    public function __construct($name, $email, $phoneNumber, $fields = [])
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPhoneNumber($phoneNumber);
        $this->setFields($fields);
        $this->setLocale('nl-NL');
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Invitee
     */
    public function setId(string $id): Invitee
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Invitee
     */
    public function setName(string $name): Invitee
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Invitee
     */
    public function setEmail(string $email): Invitee
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return Invitee
     */
    public function setLocale(string $locale): Invitee
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition(): int
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return Invitee
     */
    public function setPosition(int $position): Invitee
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getIdentificationMethods(): array
    {
        return $this->identificationMethods;
    }

    /**
     * @param string[] $identificationMethods
     * @return Invitee
     */
    public function setIdentificationMethods(array $identificationMethods): Invitee
    {
        $this->identificationMethods = $identificationMethods;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return Invitee
     */
    public function setPhoneNumber(string $phoneNumber): Invitee
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(): string
    {
        return $this->reference;
    }

    /**
     * @param string|null $reference
     * @return Invitee
     */
    public function setReference($reference): Invitee
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReadOnly(): bool
    {
        return $this->readOnly;
    }

    /**
     * @param bool $readOnly
     * @return Invitee
     */
    public function setReadOnly(bool $readOnly): Invitee
    {
        $this->readOnly = $readOnly;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string|null $state
     * @return Invitee
     */
    public function setState($state): Invitee
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getStateComment(): string
    {
        return $this->stateComment;
    }

    /**
     * @param string|null $stateComment
     * @return Invitee
     */
    public function setStateComment($stateComment): Invitee
    {
        $this->stateComment = $stateComment;
        return $this;
    }

    /**
     * @return string
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }

    /**
     * @param string $redirectUrl
     * @return Invitee
     */
    public function setRedirectUrl(string $redirectUrl): Invitee
    {
        $this->redirectUrl = $redirectUrl;
        return $this;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param Field[] $fields
     * @return Invitee
     */
    public function setFields(array $fields): Invitee
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'position' => $this->position,
            'locale' => $this->locale,
            'fields' => $this->fields,
            'identificationMethods' => $this->identificationMethods,
            'phoneNumber' => $this->phoneNumber,
            'readOnly' => $this->readOnly,
            'redirectUrl' => $this->redirectUrl,
        ];
    }
}