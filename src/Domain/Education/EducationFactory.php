<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Education;

final class EducationFactory
{
    public function create(array $educations): EducationCollection
    {
        $educationCollection = new EducationCollection();

        foreach ($educations as $educationId => $education) {
            $educationCollection->add(
                new Education(
                    $educationId,
                    new \DateTimeImmutable($education['start_date']),
                    !empty($education['end_date']) ? new \DateTimeImmutable($education['end_date']) : null,
                    $education['short_name'],
                    $education['long_name'],
                    $education['description'],
                    $education['modules'],
                    $education['score'] ?? null,
                    $education['location'],
                    $education['image'] ?? null,
                    $education['url'] ?? null,
                )
            );
        }
        $educationCollection->sortByStartDateDesc();

        return $educationCollection;
    }
}
