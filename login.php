<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form input values
    $account_number = trim($_POST['account_number']); // Account number for login
    $password = $_POST['password']; // Plain password entered by user

    // SQL query to check if account number exists
    $sql = "SELECT * FROM accounts WHERE account_number = :account_number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['account_number' => $account_number]);
    $user = $stmt->fetch();

    // If user exists and password matches
    if ($user && password_verify($password, $user['password'])) {
        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['account_holder_name'] = $user['account_holder_name']; // User's name
        $_SESSION['account_number'] = $user['account_number']; // User's account number
        $_SESSION['balance'] = $user['balance']; // User's balance

        // Redirect to a welcome or dashboard page
        header('Location: welcome.php');
        exit;
    } else {
        // If credentials are invalid
        $error = "Invalid account number or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="text" name="account_number" placeholder="Account Number" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <a href="register.php">Register</a>
</body>
</html>
