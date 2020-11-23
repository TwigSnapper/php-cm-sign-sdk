<?php

namespace TwigSnapper\CmSignSdk\Entity;

/**
 * Class Webhook
 * @package TwigSnapper\CmSignSdk\Entity
 */
class Webhook implements \JsonSerializable
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var string
     */
    private string $url;

    /**
     * @var array
     */
    private array $headers;

    /**
     * @var string
     */
    private string $createdAt;

    /**
     * @var string
     */
    private string $updatedAt;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Webhook
     */
    public function setId(string $id): Webhook
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Webhook
     */
    public function setUrl(string $url): Webhook
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return Webhook
     */
    public function setHeaders(array $headers): Webhook
    {
        $this->headers = $headers;
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
     * @return Webhook
     */
    public function setCreatedAt(string $createdAt): Webhook
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
     * @return Webhook
     */
    public function setUpdatedAt(string $updatedAt): Webhook
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'url' => $this->url,
            'headers' => $this->headers
        ];
    }
}