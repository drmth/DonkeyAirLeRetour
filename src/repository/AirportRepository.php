<?php

include dirname(__DIR__).'/model/Airport.php';

class AirportRepository extends AbstractRepository
{
    public function getAirportList ()
    {
        $query = 'SELECT * FROM airports';
        $statement = $this->pdo->query($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Airport::class);
    }
}