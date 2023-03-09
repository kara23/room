<?php
include "../classes/items.php";
$items = new items;
$items->checked();
$items->delete();
$items->list();
