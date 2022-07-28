<?php

include dirname(__DIR__).'/model/Flight.php'; 

class FlightRepository extends AbstractRepository
{
    public function getFlights($departure_airport, $destination_airport, $departure_date)
    {
        $query = 'SELECT * FROM flight WHERE departure_airport = :departure_airport AND destination_airport = :destination_airport AND flight.date = :departure_date';
        $statement= $this->pdo->prepare($query);
        $statement->bindValue(':departure_airport', $departure_airport);
        $statement->bindValue(':destination_airport', $destination_airport);
        $statement->bindValue(':departure_date', $departure_date);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Flight::class);
    }
}