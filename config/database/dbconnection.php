<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'room';

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_errno) {
    die("Connection failed. " . $conn->connect_error);
}
