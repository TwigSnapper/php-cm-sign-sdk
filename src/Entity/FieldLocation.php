<?php

namespace CmSignSdk\Entity;

/**
 * Class FieldLocation
 * @package CmSignSdk\Entity
 */
class FieldLocation implements \JsonSerializable
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
     * FieldLocation constructor.
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     * @param string $range
     */
    public function __construct(int $x, int $y, int $width, int $height, string $range = '1')
    {
        $this->setX($x);
        $this->setY($y);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setRange($range);
    }

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

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'range' => $this->range,
            'x' => $this->x,
            'y' => $this->y,
            'width' => $this->width,
            'height' => $this->height,
        ];
    }
}