<?php

namespace abonneController;

use controller\Controller;

Class AbonneController extends Controller
{
    private $EntityAbonne;

    public function __construct()
    {
        $this->EntityAbonne = new \abonneModel\AbonneModel;
    }
    public function index()
    {
        $abonne = $this->getAllAbonne();
        $this->render('layout.php', 'abonne.php', ["abonne" => $abonne]);
    }

    public function getAllAbonne()
    {
    $response = $this->EntityAbonne->read();
    return $response;
    }
}