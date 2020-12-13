<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Techno;

final class Techno
{
    /* TYPES */
    public const LANGUAGE = 'language';
    public const FRAMEWORK = 'framework';
    public const TOOLS = 'tools';
    public const DATABASE = 'database';
    public const PANEL = 'panel';
    public const LIBRARY = 'library';
    public const CLOUD = 'cloud';
    public const MESSAGE_BROKER = 'message-broker';
    public const API = 'api';
    public const STORAGE = 'storage';

    private string $technoId;
    private string $label;
    private string $type;
    private ?Techno $parent;
    /** @var Techno[] $children */
    private array $children;

    public function __construct(
        string $technoId,
        string $label,
        string $type,
        ?Techno $parent = null
    ) {
        $this->technoId = $technoId;
        $this->label = $label;
        $this->type = $type;
        $this->parent = $parent;
    }

    public function getTechnoId(): string
    {
        return $this->technoId;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getParent(): ?Techno
    {
        return $this->parent;
    }

    public function addChild(Techno $techno): self
    {
        $this->children[] = $techno;

        return $this;
    }

    /**
     * @return Techno[]
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    public function equals(Techno $techno): bool
    {
        return $techno->technoId === $this->technoId;
    }
}
