<?php

include dirname(__DIR__).'/model/Airport.php';

class AirportRepository {
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAirportList ()
    {
        $query = 'SELECT * FROM airports';
        $statement = $this->pdo->query($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Airport::class);
    }
}