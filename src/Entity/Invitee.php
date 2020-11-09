<?php

namespace CmSignSdk\Entity;

/**
 * Class Invitee
 * @package CmSignSdk\Entity
 */
class Invitee
{
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
    private $position;

    /**
     * @var string[]
     */
    private $identificationMethods;

    /**
     * @var Payment[]
     */
    private $payments;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var boolean
     */
    private $readOnly = false;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
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
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @param Payment[] $payments
     * @return Invitee
     */
    public function setPayments(array $payments): Invitee
    {
        $this->payments = $payments;
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
     * @param string $reference
     * @return Invitee
     */
    public function setReference(string $reference): Invitee
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
     * @param string $state
     * @return Invitee
     */
    public function setState(string $state): Invitee
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
}