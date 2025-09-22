<?php
include "config.php";
if (isset($_REQUEST["registerButton"])) {
    $new_username = $_REQUEST["new_username"];
    $new_password = $_REQUEST["new_password"];
    $email = $_REQUEST["email"];
    $full_name = $_REQUEST["full_name"];
    $phone = $_REQUEST["phone"];

    // Check if username already exists
    $checkQuery = "SELECT * FROM users WHERE username='$new_username'";
    $checkResult = mysqli_query($connection, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        echo "<script>alert('Username already exists. Please choose a different one.'); window.location.href='login.php';</script>";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, password, email, full_name, phone) VALUES ('$new_username', '$new_password', '$email', '$full_name', '$phone')";
        if (mysqli_query($connection, $insertQuery)) {
            echo "<script>alert('Registration successful! You can now log in.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error during registration. Please try again.'); window.location.href='login.php';</script>";
        }
    }
    mysqli_close($connection);
} else {
    header("Location: login.php");
    exit();
}
?>