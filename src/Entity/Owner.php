<?php

namespace TwigSnapper\CmSignSdk\Entity;

use JsonSerializable;

/**
 * Class Owner
 * @package CmSignSdk\Entity
 */
class Owner implements JsonSerializable
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var boolean
     */
    private bool $cc;

    /**
     * Owner constructor.
     * @param string $name
     * @param string $email
     * @param bool $cc
     */
    public function __construct(string $name, string $email, $cc = false)
    {
        $this->name = $name;
        $this->email = $email;
        $this->cc = $cc;
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
     * @return Owner
     */
    public function setName(string $name): Owner
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
     * @return Owner
     */
    public function setEmail(string $email): Owner
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCc(): bool
    {
        return $this->cc;
    }

    /**
     * @param bool $cc
     * @return Owner
     */
    public function setCc(bool $cc): Owner
    {
        $this->cc = $cc;
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
            'cc' => $this->cc,
        ];
    }
}