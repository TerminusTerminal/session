<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $account_holder_name = trim($_POST['account_holder_name']);
    $bank_name = trim($_POST['bank_name']);
    $account_number = trim($_POST['account_number']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $balance = trim($_POST['balance']);

    $sql = "INSERT INTO accounts (account_holder_name, bank_name, account_number, email, password, balance) 
            VALUES (:account_holder_name, :bank_name, :account_number, :email, :password, :balance)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            'account_holder_name' => $account_holder_name,
            'bank_name' => $bank_name,
            'account_number' => $account_number,
            'password' => $password,
            'balance' => $balance
        ]);
        header('Location: login.php');
        exit;
    } catch (PDOException $e) {
        $error = "Registration failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="topbar">
        <div class="logo">
            <h1>IBS</h1>
        </div>
    </div>
    <div class="content">
        <div id="inner-content">
            <h1>Register</h1>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="post" id="accountForm">
                <input type="text" name="account_holder_name" id="holderName" placeholder="Account Holder Name" required><br>
                <input type="text" name="bank_name" id="bankName" placeholder="Bank Name" required><br>
                <input type="text" name="account_number" id="accountNumber" placeholder="Account Number" required><br>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                <input type="number" step="0.01" id="amount" name="balance" placeholder="Initial Balance" required><br>
                <button type="submit" id="sbtn">Register</button>
                <a href="login.php">Login</a>
            </form>
        </div>
    </div>
</body>
</html>


