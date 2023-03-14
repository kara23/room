<?php
include "layout/header.php";
$error = $_GET['message'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row align-content-center justify-content-center mb-3">
            <div class='col-6 text-center'>
                <a href='addItem.php'>Add item</a> |
                <a href='items.php'>List Items</a>
            </div>
        </div>
        <div class="row align-content-center justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger">
                    <strong>Error message:</strong> <?= $error; ?>
                </div>
            </div>
        </div>

    </div>
</body>

</html>