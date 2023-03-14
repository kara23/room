<?php
include "../Controllers/ItemController.php";
include "../config/global.php";


class Check
{
    protected $item_id;
    protected $view;

    public function __construct($item_id, View $view) // inject View class into the __constructor method
    {
        $this->item_id = $item_id;
        $this->view = $view;

        $checkItem = new MarkAsChecked;
        $checkItem->checked($item_id);
        $view->redirect(); // redirect user to the destination route
    }
}

$redirect = new View("../view/items"); // add route to the instance;
$checkItem = new Check($_GET['item_id'], $redirect);
