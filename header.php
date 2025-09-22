<?php include "config.php"; ?>
<html>
    <head>
        <title>
            Restaurant Management System
        </title>
        <script src = "script.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <h1>Restaurant Management System</h1>
            <ul class="nav-links">
                <li class="nav-link" onclick="location.href='index.php'">Home</li>
                <li class="nav-link" onclick="location.href='view_items.php'">View Items</li>
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