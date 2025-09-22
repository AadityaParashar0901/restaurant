<?php
include "config.php";
if (isset($_REQUEST['loginButton'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    // Prepare and execute the SQL statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Successful login
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $result->fetch_assoc()['role'];
        header("Location: index.php");
        exit();
    } else {
        // Invalid credentials
        echo "<script>alert('Invalid username or password'); window.location.href='login.php';</script>";
    }
    $stmt->close();
}
?>