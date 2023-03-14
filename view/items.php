<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List items</title>
    <?php
    include "layout/header.php";
    include "../Controllers/ItemController.php";
    ?>
</head>

<body>
    <?php

    $ListItems = new ListItems;
    $ListItems->index();

    ?>
</body>

</html>