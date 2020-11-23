<?php

namespace TwigSnapper\CmSignSdk\Entity;


/**
 * Class FieldValue
 * @package TwigSnapper\CmSignSdk\Entity
 */
class FieldValue
{
    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $value;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return FieldValue
     */
    public function setType(string $type): FieldValue
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return FieldValue
     */
    public function setValue(string $value): FieldValue
    {
        $this->value = $value;
        return $this;
    }
}