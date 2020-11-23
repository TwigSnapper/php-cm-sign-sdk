<?php

namespace chrissmits91\CmSignSdk\Entity;

/**
 * Class Identification
 * @package chrissmits91\CmSignSdk\Entity
 */
class Identification
{
    /**
     * @var string
     */
    private string $identificationMethod;

    /**
     * @var string
     */
    private string $status;

    /**
     * @var array
     */
    private array $result;

    /**
     * @return string
     */
    public function getIdentificationMethod(): string
    {
        return $this->identificationMethod;
    }

    /**
     * @param string $identificationMethod
     * @return Identification
     */
    public function setIdentificationMethod(string $identificationMethod): Identification
    {
        $this->identificationMethod = $identificationMethod;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Identification
     */
    public function setStatus(string $status): Identification
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param array $result
     * @return Identification
     */
    public function setResult(array $result): Identification
    {
        $this->result = $result;
        return $this;
    }
}