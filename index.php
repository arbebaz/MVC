<?php

require_once('./utils/autoload.php'); 

// Instances 
$controller = new controller\Controller; 
$livre = new livreController\LivreController; 

// ROUTE 

$route = isset($_GET['route']) ? $_GET['route'] : NULL;

// ROUTER 

switch($route)
{
    case 'livre':
        $livre->index(); 
        break;

    default: 
        $controller->index();
        break; 
}


