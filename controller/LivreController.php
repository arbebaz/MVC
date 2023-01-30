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
        $livres = $this->getAllLivre();
        $this->render(
            'layout.php', 
            'livre.php', [
            "livres" => $livres
        ]);
    }

    public function getAllLivre()
    {
        $response = $this->EntityLivre->read();
        return $response;
    }
}
