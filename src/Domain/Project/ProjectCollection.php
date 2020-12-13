<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Project;

use Fredoddou\Resume\Domain\Experience\Experience;

final class ProjectCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var Project[] $projects
     */
    private array $projects;

    /**
     * @param Project[] $project
     */
    public function __construct(array $project = [])
    {
        $this->projects = $project;
    }

    public function add(Project $project): self
    {
        $this->projects[$project->getProjectId()] = $project;

        return $this;
    }

    public function has(string $projectId): bool
    {
        return array_key_exists($projectId, $this->projects);
    }

    public function get(string $projectId): Project
    {
        if (!array_key_exists($projectId, $this->projects)) {
            throw new \InvalidArgumentException('Project does not exists.');
        }

        return $this->projects[$projectId];
    }

    public function sortByStartDateDesc(): void
    {
        usort($this->projects, function (Project $projectA, Project $projectB) {
            if ($projectA->getStartDate() === $projectB->getStartDate()) {
                return 0;
            }

            return ($projectA->getStartDate() > $projectB->getStartDate()) ? -1 : 1;
        });
    }
    
    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->projects);

    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return \count($this->projects);
    }
}
