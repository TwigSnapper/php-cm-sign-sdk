<?php

namespace TwigSnapper\CmSignSdk\Entity;

/**
 * Class Branding
 * @package TwigSnapper\CmSignSdk\Entity
 */
class Branding implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private ?string $buttonBackgroundColor = null;

    /**
     * @var string|null
     */
    private ?string $buttonTextColor = null;

    /**
     * @var string|null
     */
    private ?string $logo = null;

    /**
     * @return string|null
     */
    public function getButtonBackgroundColor(): ?string
    {
        return $this->buttonBackgroundColor;
    }

    /**
     * @param string|null $buttonBackgroundColor
     * @return Branding
     */
    public function setButtonBackgroundColor(?string $buttonBackgroundColor): Branding
    {
        $this->buttonBackgroundColor = $buttonBackgroundColor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getButtonTextColor(): ?string
    {
        return $this->buttonTextColor;
    }

    /**
     * @param string|null $buttonTextColor
     * @return Branding
     */
    public function setButtonTextColor(?string $buttonTextColor): Branding
    {
        $this->buttonTextColor = $buttonTextColor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param string|null $logo
     * @return Branding
     */
    public function setLogo(?string $logo): Branding
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'buttonBackgroundColor' => $this->buttonBackgroundColor,
            'buttonTextColor' => $this->buttonTextColor,
            'logo' => $this->logo,
        ];
    }
}