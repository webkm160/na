<?php
session_start(); // Start the session at the top of the file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded credentials (for demonstration)
    $valid_username = "admin";
    $valid_password = "admin";

    // Get the values from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered username and password match
    if ($username === $valid_username && $password === $valid_password) {
        // Credentials are correct, create session variables
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;

        // Redirect to admin panel after successful login
        header("Location: faq.php");
        exit();
    } else {
        // Invalid login attempt
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            margin: 100px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
        }
        .login-footer {
            text-align: center;
            margin-top: 20px;
        }
        .login-footer a {
            text-decoration: none;
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="login-footer">
            <p>Not an admin? <a href="#">Contact support</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
