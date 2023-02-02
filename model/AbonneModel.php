<?php

namespace abonneModel;

class AbonneModel
{
    private $db;

    public function __construct()
    {
        $this->db = new \model\Model;
    }

    public function read()
    {
        $req = $this->db->pdo()->prepare('SELECT * FROM abonne');
        $req->execute();
        return $req->fetchAll(\PDO::FETCH_ASSOC);
        }
}