<?php

abstract class AbstractController
{
    protected $pdo;
    protected $id;

    public function __construct($pdo, $id = null)
    {
        $this->pdo = $pdo;
        $this->id = $id;
    }
}