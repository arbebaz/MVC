<?php

namespace livreModel; 

class LivreModel 
{

    private $db; 

    public function __construct()
    {
        $this->db = new \model\Model;
    }

    public function read(){

        var_dump($this->db);
        $req = $this->db->pdo()->prepare('SELECT * FROM livre');
        $req->execute(); 
        return $req->fetchAll(\PDO::FETCH_ASSOC);
        
    }
}