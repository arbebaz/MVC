<?php 

namespace model; 

class Model 
{

    
  /**
   * ----------- protected db 
   *  Permet de stocker un objet issu de la classe PDO, C'est à dire la connexion à la BDD.
   */
    protected $db;


   
/** 
 * --------------- CONSTANTES
 * Constantes qui vont nous permettre de définir notre BDD. **/

    const LOCALHOST = "localhost";
    const DB_NAME = "bibliotheque";
    const USER = "root";
    const PASSWORD = "";

    public function pdo()
    {

    /**
     * --------- METHODE PDO 
     * New PDO = 1 (serveur + base de données ), 2 (pseudo), 3 (mdp), 4 (options).
     * Try et Catch permettent d'avoir 2 blocs d'instructions distinct.
     * Exception est une classe prédéfinie.
     * Une exception est une erreur que l'on peut attraper grâce 
     * aux mots-clé try et catch.
     * Die a pour but de stopper l'exécution de votre script 
     * Et d'afficher le message que vous aurez éventuellement spécifié.
     * Die est très courant pour gérer les erreurs de connexion aux 
     * bases de données ou les erreurs de chemin lors des inclusions.
     */

        if(!$this->db)
        {
            try {
                $this->db = new \PDO(
                    "mysql:host=" . SELF::LOCALHOST . ";dbname=" . SELF::DB_NAME,
                    SELF::USER, 
                    SELF::PASSWORD, 
                    array(
                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
                            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                          )
                );

            } catch (\Exception $error) {
                die("Probleme de connexion : " . $error->getMessage());
            }
        }

        return $this->db; // On retourne l'objet PDO 
    }
}