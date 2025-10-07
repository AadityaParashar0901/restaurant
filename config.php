<?php
session_start();
$connection = mysqli_connect("localhost","root", "") or die("Connection Failed");
// $connection = mysqli_connect("db.fr-pari1.bengt.wasmernet.com:10272","19141210731280008e6fc7ccdf02", "068d1914-1210-74f9-8000-23bd0102d462") or die("Connection Failed");
$connection->query("CREATE DATABASE IF NOT EXISTS restaurant");
$connection->query("USE restaurant");
$connection->query("CREATE TABLE IF NOT EXISTS items (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
)");
$connection->query("CREATE TABLE IF NOT EXISTS orders (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    item_id INT(11) NOT NULL,
    quantity INT(11) NOT NULL,
    order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES items(id)
)");
$connection->query("CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'staff', 'user') DEFAULT 'user',
    email VARCHAR(100) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL
)");
?>
