<?php

namespace chrissmits91\CmSignSdk\Entity;

use JsonSerializable;

/**
 * Class Field
 * @package CmSignSdk\Entity
 */
class Field implements JsonSerializable
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $file;

    /**
     * @var string|null
     */
    private ?string $tag;

    /**
     * @var boolean
     */
    private bool $tagRequired = false;


    /**
     * @var FieldLocation[]
     */
    private array $locations = [];

    /**
     * @var string
     */
    private string $invitee;

    /**
     * Field constructor.
     * @param string $type
     * @param string $file
     * @param FieldLocation[] $locations
     */
    public function __construct(string $type, string $file, $locations = [])
    {
        $this->setType($type);
        $this->setFile($file);
        $this->setLocations($locations);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Field
     */
    public function setId(string $id): Field
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Field
     */
    public function setType(string $type): Field
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return Field
     */
    public function setFile(string $file): Field
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getTag(): string
    {
        return $this->tag;
    }

    /**
     * @param string|null $tag
     * @return Field
     */
    public function setTag($tag): Field
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTagRequired(): bool
    {
        return $this->tagRequired;
    }

    /**
     * @param bool $tagRequired
     * @return Field
     */
    public function setTagRequired(bool $tagRequired): Field
    {
        $this->tagRequired = $tagRequired;
        return $this;
    }

    /**
     * @return FieldLocation[]
     */
    public function getLocations(): array
    {
        return $this->locations;
    }

    /**
     * @param FieldLocation[] $locations
     * @return Field
     */
    public function setLocations(array $locations): Field
    {
        $this->locations = $locations;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvitee(): string
    {
        return $this->invitee;
    }

    /**
     * @param string $invitee
     * @return Field
     */
    public function setInvitee(string $invitee): Field
    {
        $this->invitee = $invitee;
        return $this;
    }

    /**
     * Specify data which should be serialized to JSON
     */
    public function jsonSerialize()
    {
        return [
            'type' => $this->type,
            'file' => $this->file,
            'tag' => $this->tag,
            'tagRequired' => $this->tagRequired,
            'locations' => $this->locations,
        ];
    }
}