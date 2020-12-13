<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Techno;

final class TechnoCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Techno[] $technos
     */
    private array $technos;

    /**
     * @param Techno[] $technos
     */
    public function __construct(array $technos = [])
    {
        $this->technos = $technos;
    }

    public function add(Techno $techno): self
    {
        $this->technos[$techno->getTechnoId()] = $techno;

        return $this;
    }

    public function has(string $technoId): bool
    {
        return array_key_exists($technoId, $this->technos);
    }

    public function get(string $technoId): Techno
    {
        if (!array_key_exists($technoId, $this->technos)) {
            throw new \InvalidArgumentException('Techno does not exists.');
        }

        return $this->technos[$technoId];
    }

    public function getByType(string $type): array
    {
        return array_filter($this->technos, function (Techno $techno) use ($type) {
            return $techno->getType() === $type || ($techno->getParent() !== null && $techno->getParent()->getType() === $type);
        });
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->technos);

    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return \count($this->technos);
    }
}
