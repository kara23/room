<?php

class Redirect
{

    private $redirect;

    function __construct($redirect) // accept route name and prepare for redirect
    {
        $this->redirect = $redirect;
        header("location:" . $this->redirect . ".php"); // add route name and redirect
    }
}
