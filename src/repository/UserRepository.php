<?php

include dirname(__DIR__).'/model/User.php';
include dirname(__DIR__).'/model/Password.php';

class UserRepository extends AbstractRepository
{
    private $cookie_name = "donkey_air_user_id";

    public function getUserId($email) 
    {
        $query =  'SELECT users.id FROM users WHERE email = :user_email';
        $statement= $this->pdo->prepare($query);
        $statement->bindValue(':user_email', $email, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll()[0]['id'];
    }

    public function getUserInfo($user_id)
    {
        $query =  'SELECT * FROM users WHERE id = :user_id';
        $statement= $this->pdo->prepare($query);
        $statement->bindValue(':user_id', $user_id, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchObject(User::class);
    }

    public function checkPassword($password, $email) 
    {
        $query = 'SELECT passwords.*, users.*
            FROM passwords 
            INNER JOIN users ON passwords.user_id = users.id
            WHERE users.email = :email';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':email', $email, \PDO::PARAM_STR);
        $statement->execute();
        $identified_user = $statement->fetchAll(PDO::FETCH_CLASS, Password::class);
        
        if (!count($identified_user)) {
            return false;
        }

        if (!password_verify($password, $identified_user[0]->password)) {
            return false;
        }

        return true;
    }

    public function createCookie($user_id)  
    {
        setcookie($this->cookie_name, $user_id, time() + (86400 * 30), "/");
    }

    public function deleteCookie()
    {
        setcookie($this->cookie_name, null, time() - 3600);
    }
}