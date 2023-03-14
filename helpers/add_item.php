<?php
include "../Controllers/ItemController.php";
include "../config/global.php";


class Add
{
    // define properties
    protected $itemName;
    protected $price;
    protected $view;

    public function __construct($itemName, $price, View $view) // inject View class into the __constructor method
    {
        $this->itemName = $itemName;
        $this->price = $price;
        $this->view = $view;

        try {
            $addItem = new AddItems;
            $addItem->store($this->itemName, $this->price);
            $this->view->redirect(); // redirect user to the destination route
        } catch (Exception $e) {
            $this->view->error($e);  // call the error() method
        }
    }
}

$redirect = new View("../view/items"); // add route to the instance;
$addItem = new Add($_POST['item_name'], $_POST['price'], $redirect);
