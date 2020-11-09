<?php

namespace CmSignSdk\Entity;

/**
 * Class Dossier
 * @package CmSignSdk\Entity
 */
class Dossier
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
    private $state;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var boolean
     */
    private $completed;

    /**
     * @var int
     */
    private $expiresIn = 2592000;

    /**
     * @var int
     */
    private $reminderIn;

    /**
     * @var string
     */
    private $expiresAt;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var File[]
     */
    private $files = [];

    /**
     * @var Owner[]
     */
    private $owners = [];

    /**
     * @var Invitee[]
     */
    private $invitees = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
     * @return Dossier
     */
    public function setName(string $name): Dossier
    {
        $this->name = $name;
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
     * @return Dossier
     */
    public function setState(string $state): Dossier
    {
        $this->state = $state;
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
     * @return Dossier
     */
    public function setLocale(string $locale): Dossier
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->completed;
    }

    /**
     * @param bool $completed
     * @return Dossier
     */
    public function setCompleted(bool $completed): Dossier
    {
        $this->completed = $completed;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    /**
     * @param int $expiresIn
     * @return Dossier
     */
    public function setExpiresIn(int $expiresIn): Dossier
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * @return int
     */
    public function getReminderIn(): int
    {
        return $this->reminderIn;
    }

    /**
     * @param int $reminderIn
     * @return Dossier
     */
    public function setReminderIn(int $reminderIn): Dossier
    {
        $this->reminderIn = $reminderIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiresAt(): string
    {
        return $this->expiresAt;
    }

    /**
     * @param string $expiresAt
     * @return Dossier
     */
    public function setExpiresAt(string $expiresAt): Dossier
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Dossier
     */
    public function setCreatedAt(string $createdAt): Dossier
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return File[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param File[] $files
     * @return Dossier
     */
    public function setFiles(array $files): Dossier
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return Owner[]
     */
    public function getOwners(): array
    {
        return $this->owners;
    }

    /**
     * @param Owner[] $owners
     * @return Dossier
     */
    public function setOwners(array $owners): Dossier
    {
        $this->owners = $owners;
        return $this;
    }

    /**
     * @return Invitee[]
     */
    public function getInvitees(): array
    {
        return $this->invitees;
    }

    /**
     * @param Invitee[] $invitees
     * @return Dossier
     */
    public function setInvitees(array $invitees): Dossier
    {
        $this->invitees = $invitees;
        return $this;
    }
}