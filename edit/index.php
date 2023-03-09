<?php

include "../classes/items.php";
$item_id = $_GET['id'];
$item = new items;
$item->getItem($item_id);
