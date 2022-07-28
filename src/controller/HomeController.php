<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/AirportRepository.php';
include dirname(__DIR__).'/repository/FlightRepository.php';

class HomeController extends AbstractController
{
    public function index()
    {
        $flights = [];
        $airportsObject = new AirportRepository($this->pdo);
        $airports = $airportsObject->getAirportList();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $flights = $this->getFlights($_POST['departure_airport'], $_POST['destination_airport'], $_POST['departure_date']);
        }
        include dirname(__DIR__).'/view/HomeView.php';
    }

    public function getFlights($departure_airport, $destination_airport, $departure_date) 
    {
        $flights = new FlightRepository ($this->pdo);
        return $flights->getFlights($departure_airport, $destination_airport, $departure_date);
    }
}