<?php


namespace App\src\Factory;

/**
 * Class Creator
 * @package App\src\Factory
 */
abstract class Creator
{
    /**
     * @return mixed
     */
    public abstract function factoryMethod();

    /**
     * @return mixed
     */
    public function doFactory() {
        $factory =  $this->factoryMethod();
        return $factory;
    }
}