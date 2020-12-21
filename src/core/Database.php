<?php


namespace App\src\core;
use App\src\core\Config;
use \PDO;


class Database
{
    /**
     * @var PDO
     */
    public $pdo;

    /**
     * @return PDO
     */
    public function getPDO(): PDO {
        $pdo = new PDO(Config::DATABASE_URI, Config::DATABASE_USER, Config::DATABASE_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $this->pdo = $pdo;
    }
}