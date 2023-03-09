<?php
include "../config/database/dbconnection.php";
include "../includes/header.php";

class items
{
    protected $item_name;
    protected $price;

    public function add()
    {
        global $conn;
        if ($_POST && isset($_POST['add'])) {

            $this->item_name = $_POST['item_name'];
            $this->price = $_POST['price'];

            $created_at = date('Y-m-d h:i:s');
            $updated_at = date('Y-m-d h:i:s');
            $is_checked = 0;

            $query = $conn->prepare("INSERT INTO items (name, price, is_checked, updated_at, created_at) VALUES (?, ?, ?, ?, ?)");
            $query->bind_param("ssiss", $this->item_name, $this->price, $is_checked, $updated_at, $created_at);
            $query->execute();
            header("Location: ../items");
        }
    }

    public function getItem($item_id)
    {
        global $conn;

        $sql = "SELECT * FROM items WHERE id=$item_id";
        if ($sql) {
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results)) {
                echo "<div class='container'>";
                echo "<div class='row mt-4 align-content-center justify-content-center'>";
                echo "<div class='col-6'>";
                while ($rows = mysqli_fetch_assoc($results)) {
                    echo "<div class='col-12'>";
                    echo "<form action='../classes/items.php' method=post>";
                    echo "<label>Item name</label><br/><input type='text' name='item_name' class='form-control' value='" . $rows['name'] . "' ><br/>";
                    echo "<label>Price</label><br><input type='text' name='price' class='form-control' value='" . $rows['price'] . "' ><br/>";
                    echo "<input type='hidden' name='item_id' value=" . $item_id . " />";
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

    public function list()
    {
        global $conn;
        echo "<div class='m-4'><a href='../'>Add item</a></div>";
        $sql = "SELECT * FROM items order by created_at desc";
        if ($sql) {
            $results = mysqli_query($conn, $sql);
            if (mysqli_num_rows($results)) {
                echo "<div class='container'>";
                echo "<div class='row mt-4 align-content-center justify-content-center'>";
                echo "<div class='col-6'>";
                while ($rows = mysqli_fetch_assoc($results)) {
                    echo "<div class='col-12'><div class='alert alert-primary'>";
                    echo "Item: " . $rows['name'] . "<br/> Price: R" . $rows['price'] . " <br/><a href='?q=del&id=" . $rows["id"] . "'>Delete</a>
                     - <a href='../edit?id=" . $rows["id"] . "'>Edit</a>";
                    if ($rows['is_checked'] == true) {
                        echo " - <label class='text-success'>Checked</label>";
                    } else {
                        echo "- <a href='?q=checked&id=" . $rows["id"] . "'>Mark as checked</a>";
                    }
                    echo "</div></div>";
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
    }

    public function delete()
    {
        global $conn;
        if (isset($_GET['q'])) {
            if ($_GET['q'] == "del") {
                $item_id = $_GET['id'];
                $delete = "DELETE FROM items WHERE id=$item_id";
                mysqli_query($conn, $delete);
            }
        }
    }

    public function checked()
    {
        global $conn;
        if (isset($_GET['q'])) {
            if ($_GET['q'] == "checked") {

                $item_id = $_GET['id'];
                $checked = "UPDATE items SET is_checked=1 WHERE id=$item_id";
                mysqli_query($conn, $checked);
            }
        }
    }

    public function update()
    {
        global $conn;
        if (isset($_POST['update'])) {
            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            $price = $_POST['price'];
            $updated_at = date('Y-m-d h:i:s');

            $query = $conn->prepare("UPDATE items SET name=?, price=?, updated_at=? WHERE id=?");
            $query->bind_param("sssi", $item_name, $price, $updated_at, $item_id);
            $query->execute();
            header("Location: ../items");
        }
    }
}

$db = new items;
$db->update();
$db->add();
