<?php 

namespace controller; 


class Controller 
{
    public function index()
    {
        $this->render('layout.php', 'home.php', [
            'title' => "Page Home 🏡"
        ]);

    }

    protected function render($layout, $template, $parameters = []) 
    {


        // permettent d'extraire chaque indice d un array sous forme de variable
            extract($parameters); 

            ob_start();
            // mise en tampon, on commence a garder en mémoire des données.

            // require_once " view
            require_once "view/$template";
            // cette inclusion est stockée directement dans la variable $content

            // $content = le fichier
            $content = ob_get_clean();
            // on stock la mise en mémoire, c'est à dire que l'on stock dans la variable 
            // $content, le template lui-même, c'est à dire le résultat du require

            ob_start(); // temporise la sortie d'affichage

            // require_once "template/layout.php
            require_once "template/$layout";

            // on inclue le layout qui est le gabarit de base (header/nav/footer )
            return ob_end_flush();
            //  libère l'affichage et fait tout apparaitre sur le navigateur / Envoi les données de la mise en mémoire, mise en tampon de sortie.
  
    }
}