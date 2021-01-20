<?php


namespace App\src\Factory;


use App\src\repository\MessageRepository;

/**
 * Class MessageFactory
 * @package App\src\Factory
 */
class MessageFactory extends Creator
{
    /**
     * @return MessageRepository
     */
    public function factoryMethod()
    {
        return new MessageRepository();
    }
}