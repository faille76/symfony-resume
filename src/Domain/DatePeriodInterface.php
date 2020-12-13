<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain;

interface DatePeriodInterface
{
    public function getStartDate(): \DateTimeImmutable;

    public function getEndDate(): ?\DateTimeImmutable;

    public function getDuration(): \DateInterval;
}
