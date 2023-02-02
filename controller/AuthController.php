<?php

namespace authController;

use controller\Controller;


class AuthController extends Controller
{
    private $EntityAuth;

    public function __construct()
    {
        $this->EntityAuth = new \authModel\AuthModel;
    }

    public function showSignUp()
    {
        $this->render('layout.php', 'signup.php'); 
    }

    public function showSign()
    {
        $this->render('layout.php', 'sign.php'); 
    }

    public function addUsers($values)
    {
        print_r($values);
        $this->EntityAuth->signUp($values);
        header('Location: ?route=') ;
    }

    public function sign($user)
    {
        $this->EntityAuth->sign($user);
        header('Location: ?route=') ;
    }


    public function logout($user)
    {
        session_destroy();
        header('Location: ?route=') ;

    }
}