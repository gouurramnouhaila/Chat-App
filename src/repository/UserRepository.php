<?php


namespace App\src\repository;

use App\src\repository\ModelRepository;

class UserRepository extends ModelRepository
{

    /**
     * @return bool
     */
    public function submitted(): bool {
        return self::add($_POST['firstName'],$_POST['lastName'],$_POST['number'],$_POST['email'],$_POST['password']);
    }


    /**
     * @return array
     */
    public function attributes(): array
    {
        return ['firstName','lastName','number','email','password'];
    }


    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function login(string $email, string $password):bool {
        $user = $this->findOne($email);

        if(empty($email) || empty($password) || !$user) {
            return false;
        }
        if($user->email !== $email && $user->password !== $password) {
            return false;
        }

        return true;
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $number
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function add(string $firstName, string $lastName, string $number, string $email, string $password):bool {
        $attributes = implode(",",$this->attributes());

        $statement = self::prepare("INSERT INTO user (".$attributes.") VALUES('".$firstName."','".$lastName."','".$number."','".$email."','".$password."')");

        $statement->execute();
        return true;
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function findOne(string $email) {
        $sql = "SELECT * FROM user WHERE email='".$email."'";
        $statement = self::prepare($sql);

        $statement->execute();
        return $statement->fetchObject(static::class);
    }

}