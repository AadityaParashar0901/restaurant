<?php include "config.php"; ?>
<html>
    <head>
        <title>
            Restaurant Management System
        </title>
        <script src = "script.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=call" />
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
        </style>
    </head>
    <body>
        <header class="top-header">
            <span><span class="material-symbols-outlined">call</span>+91 00000 00000</span>
            <span>Some Address</span>
        </header>
        <header>
            <h2 style="position: absolute; cursor: pointer;" onclick="location.href='.'">Restaurant Management System</h2>
            <h2 style="visibility: hidden;">########</h2>
            <ul class="nav-links">
                <li class="nav-link" onclick="location.href='index.php'">Home</li>
                <li class="nav-link" onclick="location.href='view_items.php'">View Items</li>
                <li class="nav-link" onclick="location.href='menu.php'">Menu</li>
                <li class="nav-link" onclick="location.href='contact.php'">Contact</li>
                <li class="nav-link" onclick="location.href='about.php'">About</li>
            </ul>
            <ul class="nav-links">
                <?php if (!isset($_SESSION['username'])) { ?>
                    <li class="nav-link" onclick="location.href='login.php'">Login & Sign Up</li>
                <?php } else { ?>
                    <?php if ($_SESSION['usertype'] == 'admin' || $_SESSION['usertype'] == "staff") { ?>
                        <li class="nav-link" onclick="location.href='view_orders.php'">Manage Orders</li>
                    <?php } else { ?>
                        <li class="nav-link" onclick="location.href='view_cart.php'">View Cart</li>
                    <?php } ?>
                    <li class="nav-link" onclick="location.href='logout.php'">Logout</li>
                <?php } ?>
            </ul>
        </header>