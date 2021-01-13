<?php


namespace App\src\repository;

/**
 * Class Imessage
 * @package App\src\repository
 */
abstract class Imessage extends ModelRepository
{
    /**
     * @return array
     */
    public abstract function getMessage(): array;

    /**
     * @return mixed
     */
    public abstract function postMessage(int $author, string $content);
}