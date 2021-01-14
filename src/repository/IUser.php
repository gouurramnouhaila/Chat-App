<?php


namespace App\src\repository;

/**
 * Interface IUser
 * @package App\src\repository
 */
abstract class IUser extends ModelRepository
{
    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public abstract function login(string $email, string $password): bool ;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $number
     * @param string $email
     * @param string $password
     * @return bool
     */
    public abstract function add(string $firstName, string $lastName, string $number, string $email, string $password): bool;

    /**
     * @param string $email
     * @return mixed
     */
    public abstract function findOne(string $email);

    /**
     * @param $password string
     * @param string $confirmPassword
     * @return string
     */
    public function validate(string $password,string $confirmPassword): string {
        $error_Message = "";
        if($confirmPassword !== $password) {
            $error_Message = "This field must be the same as password";
        }
        else {
            $error_Message = "";
        }
        return $error_Message;
    }

}