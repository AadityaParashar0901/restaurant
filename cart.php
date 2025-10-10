<?php
session_start();
include 'db.php';
include 'config.php';

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if (isset($_POST['add_to_cart'])) {
  $item_id = $_POST['item_id'];
  if (!in_array($item_id, $_SESSION['cart'])) {
    $_SESSION['cart'][] = $item_id;
  }
}

if (isset($_GET['remove'])) {
  $remove_id = $_GET['remove'];
  $_SESSION['cart'] = array_diff($_SESSION['cart'], [$remove_id]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cart | Sizzle Spot</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Sizzle Spot</div>
    <nav>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="cart.php" class="active">Cart</a>
      <a href="login.php">Login</a>
    </nav>
  </header>

  <section class="cart">
    <h1>Your Cart</h1>
    <div class="cart-container">
      <?php
      if (count($_SESSION['cart']) == 0) {
        echo "<p>Your cart is empty.</p>";
      } else {
        $ids = implode(',', $_SESSION['cart']);
        $sql = "SELECT * FROM menu_items WHERE id IN ($ids)";
        $result = mysqli_query($conn, $sql);
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
          <div class='cart-item'>
            <img src='assets/{$row['image']}' alt='{$row['name']}'>
            <div>
              <h3>{$row['name']}</h3>
              <p>₹{$row['price']}</p>
              <a href='cart.php?remove={$row['id']}' class='remove-btn'>Remove</a>
            </div>
          </div>";
          $total += $row['price'];
        }
        echo "<h3 class='total'>Total: ₹$total</h3>";
      }
      ?>
    </div>
  </section>

  <footer>
    <p>© 2025 Sizzle Spot. All Rights Reserved.</p>
  </footer>
</body>
</html>

