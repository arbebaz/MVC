<?php

namespace authModel;

class AuthModel
{

    private $db;

    public function __construct()
    {
        $this->db = new \model\Model;
    }

    public function sign($user){

        /* @trim Supprimer les espaces en début et fin de chaine. */
        $prenom = trim($user['prenom']);
        $mdp = $user['password'];

        // on verifie si l'utilisateur existe dans la bdd.
        $request = $this->db->pdo()->prepare('SELECT * FROM users WHERE prenom = ? ');
        $request->execute([$prenom]);

        $tabUser = $request->fetch(\PDO::FETCH_ASSOC);
        /* 
      1 => On verifie si le tableau (tabUser) est comptable et s'il est comptable on regarde s'il est supérieur a 0, ce qui signifie qu'un utilisateur a été trouvé. 
      2 => On vérifie si le mdp saisi correspond a celui qu'on a en bdd.
      3 => On génère une session membre avec toutes les données de l'utilisateur qui souhaite se connecter.
    */

    if(is_countable($tabUser) && count($tabUser) >= 1)
    {
        if(password_verify($mdp, $tabUser['password']))
        {
           foreach ($tabUser as $index => $value) {

            $_SESSION['membre'][$index] = $value;

           }
        }
        else
        {
            die('ERROR PASSWORD !');
        }
    }
    else
    {
        die("USER NOT FOUND !");
    }
    }

    public function signUp($user)
    {
        /* @trim Supprimer les espaces en début et fin de chaine. */
        $prenom = trim($user['prenom']);

        // on verifie si l'utilisateur existe dans la bdd.
        $request = $this->db->pdo()->prepare('SELECT prenom FROM users WHERE prenom = ? ');
        $request->execute([$prenom]);

        if($request->rowCount() >= 1)
        {
            die('Prenom déjà utilisé !!!');
        }
        else 
        {
            $pwd = password_hash($user['password'], PASSWORD_DEFAULT);

            $req = $this->db->pdo()->prepare("INSERT INTO users VALUES (NULL, :prenom, :password)");
            $req->bindParam(':prenom', $prenom, \PDO::PARAM_STR);
            $req->bindParam(':password', $pwd, \PDO::PARAM_STR);
            $req->execute();

        }
    }
}