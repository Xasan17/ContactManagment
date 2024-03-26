<?php

namespace App\Contacts;

use App\DTO\UsersDTO;
use App\Models\User;

interface IUsersRepository
{
    public function getByEmail(string $email);
    public function create(UsersDTO $usersDTO): ?User;
}
