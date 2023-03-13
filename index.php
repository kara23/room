<?php

include "config/global.php";


class landingPage
{
    private $view;
    function __construct($view) // view name
    {
        $this->view = $view;
    }
    public function index()
    {
        new Redirect($this->view); // inject the view name into Redirect class
    }
}

$view = new landingPage("view/items");
$view->index();
