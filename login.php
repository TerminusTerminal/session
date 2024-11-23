<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $account_number = trim($_POST['account_number']);
    $password = $_POST['password']; 
    $sql = "SELECT * FROM accounts WHERE account_number = :account_number";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['account_number' => $account_number]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['account_holder_name'] = $user['account_holder_name'];
        $_SESSION['account_number'] = $user['account_number'];
        $_SESSION['balance'] = $user['balance'];
        header('Location: welcome.php');
        exit;
    } else {
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
