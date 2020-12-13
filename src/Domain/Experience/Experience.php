<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Experience;

use Fredoddou\Resume\Domain\DatePeriodInterface;
use Fredoddou\Resume\Domain\DatePeriodTrait;
use Fredoddou\Resume\Domain\Techno\ContextByTechnoInterface;
use Fredoddou\Resume\Domain\Techno\ContextByTechnoTrait;

final class Experience implements DatePeriodInterface, ContextByTechnoInterface
{
    use DatePeriodTrait;
    use ContextByTechnoTrait;

    private string $experienceId;
    private string $name;
    private string $role;
    private string $description;
    private array $missions;
    private string $location;
    private ?string $image;
    private ?string $url;

    public function __construct(
        string $experienceId,
        \DateTimeImmutable $startDate,
        ?\DateTimeImmutable $endDate,
        string $name,
        string $role,
        string $description,
        array $missions,
        array $technos,
        string $location,
        ?string $image,
        ?string $url
    ) {
        $this->experienceId = $experienceId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->name = $name;
        $this->role = $role;
        $this->description = $description;
        $this->missions = $missions;
        $this->technos = $technos;
        $this->location = $location;
        $this->image = $image;
        $this->url = $url;
    }

    public function getExperienceId(): string
    {
        return $this->experienceId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getMissions(): array
    {
        return $this->missions;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}
