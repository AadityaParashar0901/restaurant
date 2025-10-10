<?php
session_start();
if(!isset($_SESSION['employee_logged_in'])) {
  header("Location: employee_login.php");
  exit();
}
include 'db.php';

$result = $conn->query("SELECT * FROM orders ORDER BY order_time DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Orders | Sizzle Spot</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav>
    <h1>Sizzle Spot Employee</h1>
    <a href="logout.php">Logout</a>
  </nav>

  <div class="container">
    <h2>Recent Orders</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Items</th>
        <th>Total (₹)</th>
        <th>Time</th>
      </tr>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['customer_name']) ?></td>
        <td><?= htmlspecialchars($row['items']) ?></td>
        <td><?= $row['total'] ?></td>
        <td><?= $row['order_time'] ?></td>
      </tr>
      <?php endwhile; ?>
    </table>
  </div>
</body>
</html>

