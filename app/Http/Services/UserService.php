<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{
    /**
     * Create an user of given attributes and return it.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @return User
     */
    public function create(string $name, string $email, string $password): User
    {
        /* create an user and return it */
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'api_token' => str_random(User::API_TOKEN_LENGTH)
        ]);
    }
}
