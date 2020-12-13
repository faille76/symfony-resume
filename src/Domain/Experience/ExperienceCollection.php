<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Experience;

final class ExperienceCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Experience[] $experiences
     */
    private array $experiences;

    /**
     * @param Experience[] $experience
     */
    public function __construct(array $experience = [])
    {
        $this->experiences = $experience;
    }

    public function add(Experience $experience): self
    {
        $this->experiences[$experience->getExperienceId()] = $experience;

        return $this;
    }

    public function has(string $experienceId): bool
    {
        return array_key_exists($experienceId, $this->experiences);
    }

    public function get(string $experienceId): Experience
    {
        if (!array_key_exists($experienceId, $this->experiences)) {
            throw new \InvalidArgumentException('Experience does not exists.');
        }

        return $this->experiences[$experienceId];
    }

    public function sortByStartDateDesc(): void
    {
        usort($this->experiences, function (Experience $experienceA, Experience $experienceB) {
            if ($experienceA->getStartDate() === $experienceB->getStartDate()) {
                return 0;
            }

            return ($experienceA->getStartDate() > $experienceB->getStartDate()) ? -1 : 1;
        });
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->experiences);

    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return \count($this->experiences);
    }
}
