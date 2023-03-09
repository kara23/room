<?php
include "includes/header.php";
?>
<div class="container">
    <div class="row align-content-center justify-content-center">
        <div class="col-lg-4 mt-3">
            <form action="classes/items.php" method="post">
                <label>Item name</label><br>
                <input type="text" name="item_name" class="form-control" /><br />

                <label>Price</label><br>
                <input type="text" name="price" class="form-control" />
                <input type="hidden" name="add" value='add' /><br>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

    <div class="row align-content-center justify-content-center">
        <div class="col-lg-4 mt-3">
            <div class="row">
                <div class="col-12">
                    <a href="items">
                        <div class="alert alert-info">See items</div>
                        <a>
                </div>
            </div>
        </div>
    </div>
</div>