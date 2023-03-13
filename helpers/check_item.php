<?php
include "../Controller/ItemController.php";
include "../config/global.php";


class CheckItem
{

    public function check($item_id, $view)
    {
        $checkItem = new MarkAsChecked;
        $checkItem->checked($item_id);
        new Redirect($view); // inject the view name into Redirect class
    }
}

$checkItem = new CheckItem;
$checkItem->check($_GET['item_id'], "../view/items");
