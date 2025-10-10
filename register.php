<?php
include 'db.php';
$msg = '';

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
  if (mysqli_num_rows($check) > 0) {
    $msg = "Username already exists.";
  } else {
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
    $msg = "Account created successfully. <a href='login.php'>Login now</a>.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Sizzle Spot</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Sizzle Spot</div>
    <nav>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="cart.php">Cart</a>
      <a href="login.php">Login</a>
    </nav>
  </header>

  <section class="register-form">
    <h1>Register</h1>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="register">Register</button>
      <p class="message"><?php echo $msg; ?></p>
    </form>
  </section>

  <footer>
    <p>© 2025 Sizzle Spot. All Rights Reserved.</p>
  </footer>
</body>
</html>

