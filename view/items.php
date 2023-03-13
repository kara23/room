<?php
include "layout/header.php";
include "../Controller/ItemController.php";

$ListItems = new ListItems;
$ListItems->index();
