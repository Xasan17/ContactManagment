<?php

namespace App\DTO;

class UsersDTO
{
    private string $name;
    private string $email;
    private string $password;


    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
    public static function fromArray(array $data): UsersDTO
    {
        return new UsersDTO(
            name: $data['name'],
            email: $data['email'],
            password: $data['password'],
        );
    }
}
