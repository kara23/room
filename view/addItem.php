<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add item</title>
    <?php
    include "layout/header.php";
    ?>
</head>

<body>
    <div class="container">
        <div class="row align-content-center justify-content-center">
            <div class="col-lg-4 mt-3">
                <form action="../helpers/add_item.php" method="post">
                    <label>Item name</label><br>
                    <input type="text" name="item_name" required class="form-control" /><br />

                    <label>Price</label><br>
                    <input type="text" name="price" required class="form-control" /><br>
                    <button type="submit" name="add" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

        <div class="row align-content-center justify-content-center">
            <div class="col-lg-4 mt-3">
                <div class="row">
                    <div class="col-12">
                        <a href="items.php">
                            <div class="alert alert-info">See items</div>
                            <a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>