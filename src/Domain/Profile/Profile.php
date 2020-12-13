<?php

declare(strict_types=1);

namespace Fredoddou\Resume\Domain\Profile;

final class Profile
{
    private string $firstName;
    private string $lastName;
    private \DateTimeImmutable $birthday;
    private string $jobTitle;
    private array $description;
    private array $tags;
    private string $resumeFile;
    private array $interests;
    private array $strength;
    private string $email;
    private ?string $phoneNumber;
    private ?string $address;
    private ?string $github;
    private ?string $linkedin;

    public function __construct(
        string $firstName,
        string $lastName,
        \DateTimeImmutable $birthday,
        string $jobTitle,
        array $description,
        array $tags,
        string $resumeFile,
        array $interests,
        array $strength,
        string $email,
        ?string $phoneNumber,
        ?string $address,
        ?string $github,
        ?string $linkedin
    )
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
        $this->jobTitle = $jobTitle;
        $this->description = $description;
        $this->resumeFile = $resumeFile;
        $this->interests = $interests;
        $this->strength = $strength;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->github = $github;
        $this->linkedin = $linkedin;
        $this->tags = $tags;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getBirthday(): \DateTimeImmutable
    {
        return $this->birthday;
    }

    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    public function getDescription(): array
    {
        return $this->description;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getResumeFile(): string
    {
        return $this->resumeFile;
    }

    public function getInterests(): array
    {
        return $this->interests;
    }

    public function getStrength(): array
    {
        return $this->strength;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }
}
