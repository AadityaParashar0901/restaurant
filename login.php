<?php include "header.php"; ?>
        <div class="container">
            <form action="authenticate.php" method="POST">
                <h2>Login</h2>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button type="submit" name="loginButton">Login</button>
            </form>
            <form action="register.php" method="POST">
                <h2>Register</h2>
                <input type="text" id="new_username" name="new_username" placeholder="New Username" required>
                <input type="password" id="new_password" name="new_password" placeholder="New Password" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                <input type="text" id="full_name" name="full_name" placeholder="Full Name" required>
                <input type="phone" id="phone" name="phone" placeholder="Phone Number" required>
                <button type="submit" name="registerButton">Register</button>
            </form>
        </div>
<?php include "footer.php"; ?>