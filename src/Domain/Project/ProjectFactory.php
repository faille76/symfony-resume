<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Project;

use Fredoddou\Resume\Domain\Techno\TechnoCollection;
use Fredoddou\Resume\Domain\Techno\TechnoContext;

final class ProjectFactory
{
    private TechnoCollection $technoCollection;

    public function __construct(TechnoCollection $technoCollection)
    {
        $this->technoCollection = $technoCollection;
    }

    public function create(array $projects): ProjectCollection
    {
        $projectCollection = new ProjectCollection();

        foreach ($projects as $projectId => $project) {
            $technoContexts = [];

            if (!is_null($project['technos'])) {
                foreach ($project['technos'] as $technoId => $context) {
                    $technoContexts[$technoId] = new TechnoContext($this->technoCollection->get($technoId), $context);
                }
            }

            $projectCollection->add(
                new Project(
                    $projectId,
                    new \DateTimeImmutable($project['start_date']),
                    !empty($project['end_date']) ? new \DateTimeImmutable($project['end_date']) : null,
                    $project['name'],
                    $project['role'],
                    $project['description'],
                    $project['missions'],
                    $technoContexts,
                    $project['image'] ?? null,
                    $project['url'] ?? null
                )
            );
        }
        $projectCollection->sortByStartDateDesc();

        return $projectCollection;
    }
}
