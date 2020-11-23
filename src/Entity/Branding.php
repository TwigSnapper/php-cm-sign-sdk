<?php


namespace TwigSnapper\CmSignSdk\Entity;


class Branding implements \JsonSerializable
{
    private string $buttonBackgroundColor;

    private string $buttonTextColor;

    private string $logo;

    /**
     * @return string
     */
    public function getButtonBackgroundColor(): string
    {
        return $this->buttonBackgroundColor;
    }

    /**
     * @param string $buttonBackgroundColor
     * @return Branding
     */
    public function setButtonBackgroundColor(string $buttonBackgroundColor): Branding
    {
        $this->buttonBackgroundColor = $buttonBackgroundColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getButtonTextColor(): string
    {
        return $this->buttonTextColor;
    }

    /**
     * @param string $buttonTextColor
     * @return Branding
     */
    public function setButtonTextColor(string $buttonTextColor): Branding
    {
        $this->buttonTextColor = $buttonTextColor;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo(): string
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Branding
     */
    public function setLogo(string $logo): Branding
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