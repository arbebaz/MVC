<?php

class Autoload
{

    public static function inclusionAuto($className)
    {
        $tab = explode("\\", $className);
       
       if(substr($tab[1], -10) === "Controller")
       {

            require_once __DIR__ . "/" . str_replace("\\", "/", "../controller/$tab[1].php");

       }elseif(substr($tab[1], -5) === "Model")
       {
            require_once __DIR__ . "/" . str_replace("\\", "/", "../model/$tab[1].php");

       }else{

            die('Erreur file name ! ');
       }
       
    }        

} 

spl_autoload_register(array('Autoload', 'inclusionAuto')); 




/*
--------- SPL AUTOLOAD 
  1 - Lorque l'on utilise l'autoload sur une classe, il faut passer un array et la méthode doit être static.
      spl_autoload_register() : permet d'éxecuter une fonction lorsque l'interpreteur voit passer un "new" dans le code.

      Lorsque l'on instancie une classe, la function 'inclusionAuto' de la classe 'Autoload' s'execute automatiquement
      et tout ce qu'il y a apres le 'new' (namespace\class) est envoyé directement en argument a la fonction 'inclusionAuto'
      On ce sert du namespace 'controller' pour entrer dans le dossier controller  du dossier 'CRUD'
      et du nom de la classe 'Controller' pour inclure le fichier Controller.php
      Il faut bien respecter la convention de nommage pour les dossiers et les fichiers.

  2 - str_replace() : fonction prédéfinie qui permet ici de remplacer les '\' pas des '/' afin de définir le bon chemin

  3 - Chemin de la page wex controller.php
*/