<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain;

trait DatePeriodTrait
{
    private \DateTimeImmutable $startDate;
    private ?\DateTimeImmutable $endDate;

    public function getStartDate(): \DateTimeImmutable
    {
        return $this->startDate;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function getDuration(): \DateInterval
    {
        $endDate = $this->endDate;
        if ($endDate === null || $endDate > new \DateTimeImmutable('today')) {
            $endDate = new \DateTimeImmutable('today');
        }

        return $endDate->diff($this->startDate);
    }
}
