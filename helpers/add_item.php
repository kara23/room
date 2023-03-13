<?php
include "../Controller/ItemController.php";
include "../config/global.php";


class AddItem
{
    protected $itemName;
    protected $price;
    protected $view;

    public function __construct($itemName, $price, $view)
    {
        $this->itemName = $itemName;
        $this->price = $price;
        $this->view = $view;
    }

    public function submitForm()
    {
        $addItem = new AddItems;
        $addItem->store($this->itemName, $this->price);
        new Redirect($this->view); // inject the view name into Redirect class
    }
}

$addItem = new AddItem($_POST['item_name'], $_POST['price'], "../view/items");
$addItem->submitForm();
