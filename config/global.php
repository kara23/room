<?php

class View
{

    private $redirect;

    function __construct($redirect) // accept route name and prepare for redirect
    {
        $this->redirect = $redirect;
    }

    public function redirect()
    {
        header("location:" . $this->redirect . ".php"); // add route name and redirect
    }

    public function error($e)
    {
        header("location:view/error.php?error=1&message=$e"); // redirect to error page
    }
}
