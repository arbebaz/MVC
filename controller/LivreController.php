<?php

namespace livreController;

use controller\Controller;

class LivreController extends Controller
{

    private $EntityLivre;
    public function __construct()
    {
        $this->EntityLivre = new \livreModel\LivreModel;
    }

    public function index()
    {
        $livre = $this->getAllLivre();
        $this->render(
            'layout.php', 
            'livre.php', [
            "livre" => $livre
        ]);
    }

    public function getAllLivre()
    {
        $response = $this->EntityLivre->read();
        return $response;
    }
}
