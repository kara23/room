<?php
include "../Controller/ItemController.php";
include "../config/global.php";


class UpdateItem
{
    public function submitForm($itemName, $price, $item_id, $view)
    {
        $updateItems = new UpdateItems;
        $updateItems->update($itemName, $price, $item_id);
        new Redirect($view); // inject the view name into Redirect class
    }
}

$updateItem = new UpdateItem;
$updateItem->submitForm($_POST['item_name'], $_POST['price'], $_POST['item_id'], "../view/items");
