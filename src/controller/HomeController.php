<?php

include dirname(__DIR__).'/repository/AirportRepository.php';

class HomeController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        $airportsObject = new AirportRepository($this->pdo);
        $airports = $airportsObject->getAirportList();
        include dirname(__DIR__).'/view/HomeView.php';
    }
}