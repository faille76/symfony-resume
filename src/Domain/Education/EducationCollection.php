<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Education;

use Fredoddou\Resume\Domain\Experience\Experience;

final class EducationCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Education[] $educations
     */
    private array $educations;

    /**
     * @param Education[] $education
     */
    public function __construct(array $education = [])
    {
        $this->educations = $education;
    }

    public function add(Education $education): self
    {
        $this->educations[$education->getEducationId()] = $education;

        return $this;
    }

    public function has(string $educationId): bool
    {
        return array_key_exists($educationId, $this->educations);
    }

    public function get(string $educationId): Education
    {
        if (!array_key_exists($educationId, $this->educations)) {
            throw new \InvalidArgumentException('Education does not exists.');
        }

        return $this->educations[$educationId];
    }

    public function sortByStartDateDesc(): void
    {
        usort($this->educations, function (Education $educationA, Education $educationB) {
            if ($educationA->getStartDate() === $educationB->getStartDate()) {
                return 0;
            }

            return ($educationA->getStartDate() > $educationB->getStartDate()) ? -1 : 1;
        });
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->educations);

    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return \count($this->educations);
    }
}
