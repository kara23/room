<?php

$host = 'localhost';
$username = 'kenosi_roo';
$password = 'ghp_2TUzs';
$db_name = 'kenosi_room';

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed. " . $conn->connect_error);
}
