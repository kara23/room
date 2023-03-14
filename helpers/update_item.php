<?php
include "../Controllers/ItemController.php";
include "../config/global.php";


class Update
{
    // define properties
    protected $itemName;
    protected $price;
    protected $view;
    protected $item_id;

    public function  __construct($itemName, $price, $item_id, View $view) // inject View class into the __constructor method
    {
        $this->itemName = $itemName;
        $this->price = $price;
        $this->view = $view;
        $this->item_id = $item_id;

        try {
            $updateItems = new UpdateItems;
            $updateItems->update($this->itemName, $this->price, $this->item_id);
            $this->view->redirect(); // redirect user to the destination route
        } catch (Exception $e) {
            $this->view->error($e); // call the error() method
        }
    }
}

$redirect = new View("../view/items"); // add route to the instance;
$updateItem = new Update($_POST['item_name'], $_POST['price'], $_POST['item_id'], $redirect);
