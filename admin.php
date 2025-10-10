<?php
session_start();
include 'db.php';
$msg = '';

if (isset($_POST['add'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $price = mysqli_real_escape_string($conn, $_POST['price']);
  $image = mysqli_real_escape_string($conn, $_POST['image']);
  mysqli_query($conn, "INSERT INTO menu_items (name, price, image) VALUES ('$name', '$price', '$image')");
  $msg = "Item added!";
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM menu_items WHERE id=$id");
  $msg = "Item deleted!";
}

$result = mysqli_query($conn, "SELECT * FROM menu_items");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin | Sizzle Spot</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">í´¥ Admin Panel</div>
    <nav>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
    </nav>
  </header>

  <section class="admin">
    <h1>Manage Menu</h1>
    <form method="post">
      <input type="text" name="name" placeholder="Item Name" required>
      <input type="number" name="price" placeholder="Price" required>
      <input type="text" name="image" placeholder="Image filename (in assets)">
      <button type="submit" name="add">Add Item</button>
    </form>
    <p class="msg"><?php echo $msg; ?></p>

    <div class="menu-container">
      <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="card">
        <img src="assets/<?php echo $row['image']; ?>" alt="">
        <h3><?php echo $row['name']; ?></h3>
        <p>â‚¹<?php echo $row['price']; ?></p>
        <a href="admin.php?delete=<?php echo $row['id']; ?>" class="remove-btn">Delete</a>
      </div>
      <?php } ?>
    </div>
  </section>

  <footer>
    <p>Â© 2025 Sizzle Spot. Admin Area.</p>
  </footer>
</body>
</html>

