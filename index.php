<?php

include "config/global.php";

class Home
{
    private $view;
    function __construct(View $view) // inject View class into the __constructor function
    {
        $this->view = $view;
        $this->view->redirect(); // redirect user to the destination route
    }
}

$redirect = new View("view/items"); // add route to the instance;
$view = new Home($redirect);
