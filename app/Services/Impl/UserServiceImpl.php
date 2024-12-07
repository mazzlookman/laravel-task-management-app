<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
    private array $users = [
        "blue@test.com" => "qwe"
    ];
    function login(string $email, string $password): bool
    {
      if (!isset($this->users[$email])){
          return false;
      }

      $correctPassword = $this->users[$email];
      return $password === $correctPassword;
    }
}
