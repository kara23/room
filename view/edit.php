<?php
include "layout/header.php";
include "../Controller/ItemController.php";

$id = $_GET['id'];
$getItem = new getItem($id);
$getItem->getItem();
