<?php

namespace CmSignSdk\Entity;

/**
 * Class FieldLocation
 * @package CmSignSdk\Entity
 */
class FieldLocation
{
    /**
     * @var string
     */
    private $range;

    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @return string
     */
    public function getRange(): string
    {
        return $this->range;
    }

    /**
     * @param string $range
     * @return FieldLocation
     */
    public function setRange(string $range): FieldLocation
    {
        $this->range = $range;
        return $this;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     * @return FieldLocation
     */
    public function setX(int $x): FieldLocation
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     * @return FieldLocation
     */
    public function setY(int $y): FieldLocation
    {
        $this->y = $y;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return FieldLocation
     */
    public function setWidth(int $width): FieldLocation
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return FieldLocation
     */
    public function setHeight(int $height): FieldLocation
    {
        $this->height = $height;
        return $this;
    }
}