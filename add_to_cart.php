<?php
include "config.php";
if (isset($_REQUEST["item_id"])) {
    if (!isset($_SESSION['username'])) {
        echo "Please log in to add items to your cart.";
        exit();
    }
    $item_id = intval($_POST['item_id']);
    $username = $_SESSION['username'];

    // Check if the item exists
    $item_check = $connection->prepare("SELECT * FROM items WHERE id = ?");
    $item_check->bind_param("i", $item_id);
    $item_check->execute();
    $item_result = $item_check->get_result();
    if ($item_result->num_rows === 0) {
        echo "Item not found.";
        exit();
    }
    $item_row = $item_result->fetch_assoc();
    $sameEntry = $connection->query("SELECT * FROM cart WHERE username = '" . $connection->real_escape_string($username) . "' AND item_id = " . intval($item_id));
    if ($sameEntry && $sameEntry->num_rows > 0) {
        $connection->query("UPDATE cart SET quantity = quantity + 1 WHERE username = '" . $connection->real_escape_string($username) . "' AND item_id = " . intval($item_id));
        echo "Item updated in your cart.";
        exit();
    }
    // Add item to cart
    $stmt = $connection->prepare("INSERT INTO cart (username, item_name, item_id, quantity, price) VALUES (?, ?, ?, 1, ?)");
    $stmt->bind_param("ssid", $username, $item_row['name'], $item_id, $item_row['price']);
    if ($stmt->execute()) {
        echo "Item added to cart successfully.";
    } else {
        echo "Error adding item to cart.";
    }
} else {
    echo "Invalid request.";
}
?>