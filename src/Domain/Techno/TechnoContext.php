<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Techno;

final class TechnoContext
{
    private Techno $techno;
    private ?string $context;

    public function __construct(Techno $techno, ?string $context)
    {
        $this->techno = $techno;
        $this->context = $context;
    }

    public function getTechno(): Techno
    {
        return $this->techno;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }
}
