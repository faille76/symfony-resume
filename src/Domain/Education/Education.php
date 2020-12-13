<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Education;

use Fredoddou\Resume\Domain\DatePeriodInterface;
use Fredoddou\Resume\Domain\DatePeriodTrait;

final class Education implements DatePeriodInterface
{
    use DatePeriodTrait;

    private string $educationId;
    private string $shortName;
    private string $fullName;
    private string $description;
    private array $modules;
    private ?string $score;
    private string $location;
    private ?string $image;
    private ?string $url;

    public function __construct(
        string $educationId,
        \DateTimeImmutable $startDate,
        ?\DateTimeImmutable $endDate,
        string $shortName,
        string $fullName,
        string $description,
        array $modules,
        ?string $score,
        string $location,
        ?string $image,
        ?string $url
    ) {
        $this->educationId = $educationId;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->shortName = $shortName;
        $this->fullName = $fullName;
        $this->description = $description;
        $this->modules = $modules;
        $this->score = $score;
        $this->location = $location;
        $this->image = $image;
        $this->url = $url;
    }

    public function getEducationId(): string
    {
        return $this->educationId;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function getFullName(): string
    {
        return $this->fullName;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getModules(): array
    {
        return $this->modules;
    }

    public function getScore(): ?string
    {
        return $this->score;
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
