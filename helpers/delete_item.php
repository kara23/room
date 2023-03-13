<?php
include "../Controller/ItemController.php";
include "../config/global.php";


class Delete
{

    public function del($item_id, $view)
    {
        $deleteItem = new DeleteItem;
        $deleteItem->delete($item_id);
        new Redirect($view); // inject the view name into Redirect class
    }
}

$deleteItem = new Delete;
$deleteItem->del($_GET['item_id'], "../view/items");
