<?php

namespace App\DTO;

class UserLoginDTO
{

    private string $email;
    private string $password;


    public function __construct(string $email, string $password)
    {

        $this->email = $email;
        $this->password = $password;

    }


    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function fromArray(array $data): UserLoginDTO
    {
        return new UserLoginDTO(

            email: $data['email'],
            password: $data['password'],


        );
    }
}
