<?php

namespace App\Repository;

use App\Contacts\IUsersRepository;
use App\DTO\UsersDTO;
use App\Models\User;

class UserRepository implements IUsersRepository
{
    public function getByEmail(string $email): ?User
    {
        /**
         * @var User|null $user
         */
        $user = User::query()->where('email', '=', $email)->first();

        return $user;
    }
    public function create(UsersDTO $usersDTO): ?User
    {
        $user = new User();
        $user->name = $usersDTO->getName();
        $user->email = $usersDTO->getEmail();
        $user->password = bcrypt($usersDTO->getPassword());
        $user->save();

        return $user;
    }

}
