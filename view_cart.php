<?php include "header.php"; ?>
        <div class="container">
            <h2>Your Cart</h2>
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<p>Please <a href='login.php'>login</a> to view your cart.</p>";
            } else {
                $username = $_SESSION['username'];
                $cart_query = "SELECT * FROM cart WHERE username='$username'";
                $cart_result = mysqli_query($connection, $cart_query);

                if (mysqli_num_rows($cart_result) > 0) {
                    echo "<table>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>";
                    $grand_total = 0;
                    while ($row = mysqli_fetch_assoc($cart_result)) {
                        $item_total = $row['quantity'] * $row['price'];
                        $grand_total += $item_total;
                        echo "<tr>
                                <td>{$row['item_name']}</td>
                                <td>{$row['quantity']}</td>
                                <td>\${$row['price']}</td>
                                <td>\$$item_total</td>
                              </tr>";
                    }
                    echo "<tr>
                            <td colspan='3'><strong>Grand Total</strong></td>
                            <td><strong>\$$grand_total</strong></td>
                          </tr>";
                    echo "</table>";
                } else {
                    echo "<p>Your cart is empty. <a href='view_items.php'>Browse items</a> to add to your cart.</p>";
                }
            }
            ?>
        </div>
<?php include "footer.php"; ?>