<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Project;

use Fredoddou\Resume\Domain\DatePeriodInterface;
use Fredoddou\Resume\Domain\DatePeriodTrait;
use Fredoddou\Resume\Domain\Techno\ContextByTechnoInterface;
use Fredoddou\Resume\Domain\Techno\ContextByTechnoTrait;

final class Project implements DatePeriodInterface, ContextByTechnoInterface
{
    use DatePeriodTrait;
    use ContextByTechnoTrait;

    private string $projectId;
    private string $name;
    private string $role;
    private string $description;
    private array $missions;
    private ?string $image;
    private ?string $url;

    public function __construct(
        string $projectId,
        \DateTimeImmutable $startDate,
        ?\DateTimeImmutable $endDate,
        string $name,
        string $role,
        string $description,
        array $missions,
        array $technos,
        ?string $image,
        ?string $url
    ) {
        $this->projectId = $projectId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->name = $name;
        $this->role = $role;
        $this->description = $description;
        $this->missions = $missions;
        $this->technos = $technos;
        $this->image = $image;
        $this->url = $url;
    }

    public function getProjectId(): string
    {
        return $this->projectId;
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}
