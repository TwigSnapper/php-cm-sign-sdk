<?php

namespace CmSignSdk\Entity;

/**
 * Class File
 * @package CmSignSdk\Entity
 */
class File
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
     * @var string
     */
    private $derivativeOf;

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
     * @return string
     */
    public function getUploadDateTime(): string
    {
        return $this->uploadDateTime;
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @return string
     */
    public function getDerivativeOf(): string
    {
        return $this->derivativeOf;
    }
}