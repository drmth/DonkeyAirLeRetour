<?php

include dirname(__DIR__).'/model/User.php';

class UserRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserInfo($user_id)
    {
        $query =  'SELECT * FROM user_infos WHERE id = :user_id';
        $statement= $this->pdo->prepare($query);
        $statement->bindValue(':user_id', $user_id, \PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchObject(User::class);
    }
}