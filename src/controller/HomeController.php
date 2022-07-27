<?php

include 'AbstractController.php';
include dirname(__DIR__).'/repository/AbstractRepository.php';
include dirname(__DIR__).'/repository/AirportRepository.php';

class HomeController extends AbstractController
{
    public function index()
    {
        $airportsObject = new AirportRepository($this->pdo);
        $airports = $airportsObject->getAirportList();
        include dirname(__DIR__).'/view/HomeView.php';
    }
}