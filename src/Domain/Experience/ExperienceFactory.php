<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Experience;

use Fredoddou\Resume\Domain\Techno\TechnoCollection;
use Fredoddou\Resume\Domain\Techno\TechnoContext;

final class ExperienceFactory
{
    private TechnoCollection $technoCollection;

    public function __construct(TechnoCollection $technoCollection)
    {
        $this->technoCollection = $technoCollection;
    }

    public function create(array $experiences): ExperienceCollection
    {
        $experienceCollection = new ExperienceCollection();

        foreach ($experiences as $experienceId => $experience) {
            $technoContexts = [];

            if (!is_null($experience['technos'])) {
                foreach ($experience['technos'] as $technoId => $context) {
                    $technoContexts[$technoId] = new TechnoContext($this->technoCollection->get($technoId), $context);
                }
            }

            $experienceCollection->add(
                new Experience(
                    $experienceId,
                    new \DateTimeImmutable($experience['start_date']),
                    !empty($experience['end_date']) ? new \DateTimeImmutable($experience['end_date']) : null,
                    $experience['name'],
                    $experience['role'],
                    $experience['description'],
                    $experience['missions'],
                    $technoContexts,
                    $experience['location'],
                    $experience['image'] ?? null,
                    $experience['url'] ?? null,
                )
            );
        }
        $experienceCollection->sortByStartDateDesc();

        return $experienceCollection;
    }
}
