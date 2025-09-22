<?php include "header.php" ?>
        <div class="container">
            <div class="grid">
                <?php
                $result = $connection->query("SELECT * FROM items ORDER BY name ASC");
                while ($result && $row = $result->fetch_assoc()) {
                    echo "<div class='grid-item'>";
                    echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                    echo "<p>Price: $" . number_format($row['price'], 2) . "</p>";
                    echo "<button onclick=\"addToOrder(" . intval($row['id']) . ")\">Add to Order</button>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
        <script>
            function addToOrder(itemId) {
                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'item_id=' + itemId + '&quantity=1'
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        </script>
<?php include "footer.php" ?>