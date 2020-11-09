<?php

namespace CmSignSdk\Entity;

/**
 * Class Owner
 * @package CmSignSdk\Entity
 */
class Owner
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
     * @var boolean
     */
    private $cc = false;

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
}