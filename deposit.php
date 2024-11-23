<?php
require 'db.php';
session_start();

if (!isset($_SESSION['account_number'])) { //account checker :)
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $deposit_amount = $_POST['deposit_amount'];

    if ($deposit_amount > 0) {
        $sql = "SELECT balance FROM accounts WHERE account_number = :account_number";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['account_number' => $_SESSION['account_number']]);
        $user = $stmt->fetch();

        if ($user) {
            $new_balance = $user['balance'] + $deposit_amount;
            $update_sql = "UPDATE accounts SET balance = :new_balance WHERE account_number = :account_number";
            $update_stmt = $pdo->prepare($update_sql);
            $update_stmt->execute(['new_balance' => $new_balance, 'account_number' => $_SESSION['account_number']]);
            header('Location: check_balance.php');
            exit;
        } else {
            $error = "Account not found.";
        }
    } else {
        $error = "Deposit amount must be greater than zero.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deposit Money</title>
</head>
<body>
    <h1>Deposit Money</h1>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <input type="number" name="deposit_amount" step="0.01" placeholder="Amount to Deposit" required><br>
        <button type="submit">Deposit</button>
    </form>
    <a href="check_balance.php">Back to Check Balance</a>
</body>
</html>

