<?php

session_start();
require_once('./utils/autoload.php'); 

// Instances 
$controller = new controller\Controller; 
$livre = new livreController\LivreController; 
$abonne = new abonneController\AbonneController; 
$auth = new authController\AuthController;

// ROUTE 

$route = isset($_GET['route']) ? $_GET['route'] : NULL;

// ROUTER 

switch($route)
{
    case 'livre':
        $livre->index(); 
        break;

    case 'abonne': 
        $abonne->index();
        break;

    case 'signup':
        $auth->showSignUp();
        break;

    case 'add':
         $auth->addUsers($_POST);
         break;

    case 'pageSign':
         $auth->showSign();
         break;

    case 'sign':
         $auth->sign($_POST);
         break;

    case 'logout':
        $auth->sign($_POST);
        break;

    default: 
        $controller->index();
        break; 
}



