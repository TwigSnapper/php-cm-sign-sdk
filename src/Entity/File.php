<?php

namespace chrissmits91\CmSignSdk\Entity;

/**
 * Class File
 * @package CmSignSdk\Entity
 */
class File implements \JsonSerializable
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
    private $hash;

    /**
     * @var string
     */
    private $uploadDateTime;

    /**
     * @var string
     */
    private $contentType;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return File
     */
    public function setId(string $id): File
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
     * @return File
     */
    public function setName(string $name): File
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return File
     */
    public function setHash(string $hash): File
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getUploadDateTime(): string
    {
        return $this->uploadDateTime;
    }

    /**
     * @param string $uploadDateTime
     * @return File
     */
    public function setUploadDateTime(string $uploadDateTime): File
    {
        $this->uploadDateTime = $uploadDateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return File
     */
    public function setContentType(string $contentType): File
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}