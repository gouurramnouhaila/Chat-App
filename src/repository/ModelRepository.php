<?php


namespace App\src\repository;

use App\src\core\Application;

/**
 * Class ModelRepository
 * @package App\src\repository
 */
abstract class ModelRepository
{
    /**
     * @param $sql string
     * @return bool|\PDOStatement
     */
    function prepare(string $sql) {
        return Application::$app->db->getPDO()->prepare($sql);
    }

    /**
     * @param $data
     */
    public function loadData($data) {
        foreach ($data as $key => $value) {
            if(property_exists($this,$key)) {
                $this->{$key} = $value;
            }
        }
    }
}