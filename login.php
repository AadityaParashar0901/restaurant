<?php
session_start();
include 'db.php';
$error = '';

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    $_SESSION['user'] = $username;
    header("Location: index.php");
  } else {
    $error = "Invalid username or password.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Sizzle Spot</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">Sizzle Spot</div>
    <nav>
      <a href="index.php">Home</a>
      <a href="menu.php">Menu</a>
      <a href="cart.php">Cart</a>
      <a href="login.php" class="active">Login</a>
    </nav>
  </header>

  <section class="login-form">
    <h1>Login</h1>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
      <p>Don't have an account? <a href="register.php">Register</a></p>
      <p class="error"><?php echo $error; ?></p>
    </form>
  </section>

  <footer>
    <p>© 2025 Sizzle Spot. All Rights Reserved.</p>
  </footer>
</body>
</html>

