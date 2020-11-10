<?php

namespace chrissmits91\CmSignSdk\Entity;

/**
 * Class Invite
 * @package CmSignSdk\Entity
 */
class Invite
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $inviteeId;

    /**
     * @var string
     */
    private $inviteUri;

    /**
     * @var boolean
     */
    private $email;

    /**
     * @var object
     */
    private $emailConfig;

    /**
     * @var boolean
     */
    private $reminder;

    /**
     * @var string|null
     */
    private $emailSentAt;

    /**
     * @var int
     */
    private $expiresIn;

    /**
     * @var string
     */
    private $expiresAt;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Invite
     */
    public function setId(string $id): Invite
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInviteeId(): string
    {
        return $this->inviteeId;
    }

    /**
     * @param string $inviteeId
     * @return Invite
     */
    public function setInviteeId(string $inviteeId): Invite
    {
        $this->inviteeId = $inviteeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInviteUri(): string
    {
        return $this->inviteUri;
    }

    /**
     * @param string $inviteUri
     * @return Invite
     */
    public function setInviteUri(string $inviteUri): Invite
    {
        $this->inviteUri = $inviteUri;
        return $this;
    }

    /**
     * @return bool
     */
    public function isEmail(): bool
    {
        return $this->email;
    }

    /**
     * @param bool $email
     * @return Invite
     */
    public function setEmail(bool $email): Invite
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return object
     */
    public function getEmailConfig()
    {
        return $this->emailConfig;
    }

    /**
     * @param object $emailConfig
     * @return Invite
     */
    public function setEmailConfig($emailConfig): Invite
    {
        $this->emailConfig = $emailConfig;
        return $this;
    }

    /**
     * @return bool
     */
    public function isReminder(): bool
    {
        return $this->reminder;
    }

    /**
     * @param bool $reminder
     * @return Invite
     */
    public function setReminder(bool $reminder): Invite
    {
        $this->reminder = $reminder;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailSentAt(): string
    {
        return $this->emailSentAt;
    }

    /**
     * @param string|null $emailSentAt
     * @return Invite
     */
    public function setEmailSentAt($emailSentAt): Invite
    {
        $this->emailSentAt = $emailSentAt;
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
     * @return Invite
     */
    public function setExpiresIn(int $expiresIn): Invite
    {
        $this->expiresIn = $expiresIn;
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
     * @return Invite
     */
    public function setExpiresAt(string $expiresAt): Invite
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
     * @return Invite
     */
    public function setCreatedAt(string $createdAt): Invite
    {
        $this->createdAt = $createdAt;
        return $this;
    }
}