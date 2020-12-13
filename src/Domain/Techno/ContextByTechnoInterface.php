<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Techno;

interface ContextByTechnoInterface
{
    public function hasTechno(string $technoId): bool;

    public function getTechnoContext(string $technoId): TechnoContext;

    public function getTechnoContexts(): array;
}
