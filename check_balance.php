<?php
require 'db.php';
session_start();

if (!isset($_SESSION['account_number'])) {
    header('Location: login.php');
    exit;
}

// fetch that tang 
$sql = "SELECT balance FROM accounts WHERE account_number = :account_number";
$stmt = $pdo->prepare($sql);
$stmt->execute(['account_number' => $_SESSION['account_number']]);
$user = $stmt->fetch();

if ($user) {
    $balance = $user['balance'];
} else {
    $balance = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Check Balance</title>
</head>
<body>
    <h1>Your Account Balance</h1>
    <p>Current Balance: $<?php echo number_format($balance, 2); ?></p>
    <a href="welcome.php">Back to Dashboard</a>
</body>
</html>
