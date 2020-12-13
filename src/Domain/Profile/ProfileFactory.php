<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Profile;

final class ProfileFactory
{
    public function create(array $profile): Profile
    {
        return new Profile(
            $profile['first_name'],
            $profile['last_name'],
            new \DateTimeImmutable($profile['birthday']),
            $profile['job_title'],
            $profile['description'],
            $profile['tags'],
            $profile['resume_file'],
            $profile['interests'],
            $profile['strength'],
            $profile['contact']['email'],
            $profile['contact']['phone_number'] ?? null,
            $profile['contact']['address'] ?? null,
            $profile['contact']['social']['github'] ?? null,
            $profile['contact']['social']['linkedin'] ?? null
        );
    }
}
