<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>F4 </h1>
    <h2>Login<img src="image/loginaccount.png" class="login-icon"></h2>
    <form class="login-form" action="login.php" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required style="background-color: lightgrey;">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required style="background-color:lightgrey;">

        <a href="#">Forgot Password?</a>

        <div class="checkbox">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember me</label>
        </div>

        <button type="submit">Login</button>

        <p>Doesn't have an account? <a href="register.php">Sign up here</a></p>
    </form>
    <div class="copyright">
        <p>Copyright 2024 | F4</p>
    </div>
    <div class="illustration">
        <img src="image/calendar.jpg" alt="Calendar Illustration">
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);

        // Handle login logic here
        // For example, you might check the email and password against a database

        // Dummy check (replace with actual database query)
        if ($email == 'user@example.com' && $password == 'password') {
            echo '<p>Login successful!</p>';
            // Set a cookie if "Remember me" is checked
            if ($remember) {
                setcookie('email', $email, time() + (86400 * 30), "/"); // 86400 = 1 day
            }
        } else {
            echo '<p>Invalid email or password</p>';
        }
    }
    ?>
</body>
</html>
