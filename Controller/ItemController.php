<?php
include "../config/database/dbconnection.php";

class ListItems
{

    public function index()
    {
        global $conn;
        echo "<div class='m-4'><a href='addItem.php'>Add item</a></div>";
        $sql = "SELECT * FROM items order by id desc";
        if ($sql) {
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results)) {
                echo "<div class='container'>";
                echo "<div class='row mt-4 align-content-center justify-content-center'>";
                echo "<div class='col-6'>";
                while ($rows = mysqli_fetch_assoc($results)) {
                    echo "<div class='col-12'><div class='alert alert-primary'>";
                    echo "Item: " . $rows['name'] . "<br/> Price: R" . $rows['price'] . " <br/><a href='../helpers/delete_item.php?item_id=" . $rows["id"] . "'>Delete</a>
                     - <a href='../view/edit.php?id=" . $rows["id"] . "'>Edit</a>";
                    if ($rows['is_checked'] == true) {
                        echo " - <label class='text-success'>Checked</label>";
                    } else {
                        echo "- <a href='../helpers/check_item.php?item_id=" . $rows["id"] . "'>Mark as checked</a>";
                    }
                    echo "</div></div>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
}

class AddItems
{

    public function store($itemName, $price)
    {
        global $conn;

        $created_at = date('Y-m-d h:i:s');
        $updated_at = date('Y-m-d h:i:s');
        $is_checked = 0;

        $query = $conn->prepare("INSERT INTO items (name, price, is_checked, updated_at, created_at) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("ssiss", $itemName, $price, $is_checked, $updated_at, $created_at);
        $query->execute();
    }
}

class UpdateItems
{
    public function update($item_name, $price, $item_id)
    {

        global $conn;

        $price = $_POST['price'];
        $updated_at = date('Y-m-d h:i:s');

        $query = $conn->prepare("UPDATE items SET name=?, price=?, updated_at=? WHERE id=?");
        $query->bind_param("sssi", $item_name, $price, $updated_at, $item_id);
        $query->execute();
    }
}

class DeleteItem
{
    public function delete($item_id)
    {
        global $conn;

        $delete = "DELETE FROM items WHERE id=$item_id";
        mysqli_query($conn, $delete);
    }
}

class getItem
{

    protected $item_id;
    public function __construct($id)
    {
        $this->item_id = $id;
    }
    public function getItem()
    {

        global $conn;
        echo "<div class='m-4'>
        <a href='addItem.php'>Add item</a> | 
        <a href='items.php'>List Items</a>
        </div>";
        $sql = "SELECT * FROM items WHERE id=$this->item_id";
        if ($sql) {
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results)) {
                echo "<div class='container'>";
                echo "<div class='row mt-4 align-content-center justify-content-center'>";
                echo "<div class='col-4'>";
                while ($rows = mysqli_fetch_assoc($results)) {
                    echo "<div class='col-12'>";
                    echo "<form action='../helpers/update_item.php' method=post>";
                    echo "<label>Item name</label><br/><input type='text' required name='item_name' class='form-control' value=\"" . $rows['name'] . "\" ><br/>";
                    echo "<label>Price</label><br><input type='text' required name='price' class='form-control' value='" . $rows['price'] . "' ><br/>";
                    echo "<input type='hidden' name='item_id' value='" . $this->item_id . "' />";
                    echo "<button type='submit' name='update' class='btn btn-primary'>Update</button>";
                    echo "</form>";
                    echo "</div>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
    }
}

class MarkAsChecked
{

    public function checked($item_id)
    {
        global $conn;

        $checked = "UPDATE items SET is_checked=1 WHERE id=$item_id";
        mysqli_query($conn, $checked);
    }
}
