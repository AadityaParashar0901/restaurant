<?php include 'db.php'; ?>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Menu | Sizzle Spot</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Sizzle Spot</div>
    <nav>
      <a href="index.php">Home</a>
      <a href="menu.php" class="active">Menu</a>
      <a href="cart.php">Cart</a>
      <a href="login.php">Login</a>
    </nav>
  </header>

  <section class="menu">
    <h1>Our Menu</h1>
    <div class="menu-container">
      <?php
      $sql = "SELECT * FROM menu_items";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "
          <div class='card'>
            <img src='assets/{$row['image']}' alt='{$row['name']}'>
            <h3>{$row['name']}</h3>
            <p>₹{$row['price']}</p>
            <form method='post' action='cart.php'>
              <input type='hidden' name='item_id' value='{$row['id']}'>
              <button type='submit' name='add_to_cart'>Add to Cart</button>
            </form>
          </div>";
        }
      } else {
        echo "<p>No menu items yet.</p>";
      }
      ?>
    </div>
  </section>

  <footer>
    <p>© 2025 Sizzle Spot. All Rights Reserved.</p>
  </footer>
</body>
</html>

