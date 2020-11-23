<?php

namespace TwigSnapper\CmSignSdk\Entity;

/**
 * Class Client
 * @package TwigSnapper\CmSignSdk\Entity
 */
class Client implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $kid;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $description;

    /**
     * @var bool
     */
    private bool $admin;

    /**
     * @var bool
     */
    private bool $disabled;

    /**
     * @var string
     */
    private string $createdAt;

    /**
     * @var string
     */
    private string $updatedAt;

    /**
     * @var string
     */
    private string $key;

    /**
     * @return string
     */
    public function getKid(): string
    {
        return $this->kid;
    }

    /**
     * @param string $kid
     * @return Client
     */
    public function setKid(string $kid): Client
    {
        $this->kid = $kid;
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
     * @return Client
     */
    public function setName(string $name): Client
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Client
     */
    public function setDescription(string $description): Client
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->admin;
    }

    /**
     * @param bool $admin
     * @return Client
     */
    public function setAdmin(bool $admin): Client
    {
        $this->admin = $admin;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     * @return Client
     */
    public function setDisabled(bool $disabled): Client
    {
        $this->disabled = $disabled;
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
     * @return Client
     */
    public function setCreatedAt(string $createdAt): Client
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     * @return Client
     */
    public function setUpdatedAt(string $updatedAt): Client
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Client
     */
    public function setKey(string $key): Client
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'disabled' => $this->disabled
        ];
    }
}