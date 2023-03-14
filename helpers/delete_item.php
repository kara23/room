<?php
include "../Controllers/ItemController.php";
include "../config/global.php";


class Delete
{

    protected $item_id;
    protected $view;

    public function __construct($item_id, View $view) // inject View class into the __constructor method
    {
        $this->item_id = $item_id;
        $this->view = $view;

        $deleteItem = new DeleteItem;
        $deleteItem->delete($item_id);
        $view->redirect(); // redirect user to the destination route
    }
}

$redirect = new View("../view/items"); // add route to the instance;
$deleteItem = new Delete($_GET['item_id'], $redirect);
