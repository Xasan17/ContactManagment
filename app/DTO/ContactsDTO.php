<?php

namespace App\DTO;

class ContactsDTO
{
    public function __construct(
        private string $userId,
        private string $firstName,
        private string $lastName,
        private ?string $blocked,
        private string $email,
        private string $address
    ) {}

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getBlocked(): ?string
    {
        return $this->blocked;
    }

    public function setBlocked(?string $blocked): void
    {
        $this->blocked = $blocked;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getAddress(): string
    {
        return $this->address;
    }
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    public static function fromArray(array $data, ?int $userId = null): ContactsDTO
    {
        return new ContactsDTO(
            userId: $userId,
            firstName: $data['firstName'] ?? null,
            lastName: $data['lastName'] ?? null,
            blocked: $data['blocked'] ?? null,
            email: $data['email'] ?? null,
            address: $data['address'] ?? null
        );
    }
}
