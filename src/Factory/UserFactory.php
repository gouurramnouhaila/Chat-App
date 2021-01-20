<?php


namespace App\src\Factory;

use App\src\repository\UserRepository;

/**
 * Class UserFactory
 * @package App\src\Factory
 */
class UserFactory extends Creator
{
    /**
     * @return UserRepository
     */
    public function factoryMethod()
    {
        return new UserRepository();
    }
}