<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Techno;

trait ContextByTechnoTrait
{
    /**
     * @var TechnoContext[]
     */
    private array $technos;

    public function hasTechno(string $technoId): bool
    {
        return array_key_exists($technoId, $this->technos);
    }

    public function getTechnoContext(string $technoId): TechnoContext
    {
        if (!array_key_exists($technoId, $this->technos)) {
            throw new \InvalidArgumentException('techno was not found.');
        }

        return $this->technos[$technoId];
    }

    /**
     * @return TechnoContext[]
     */
    public function getTechnoContexts(): array
    {
        return $this->technos;
    }
}
