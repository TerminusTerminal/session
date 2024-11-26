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
    <link rel="stylesheet" href="test.css">
    <title>Deposit Money</title>
</head>
<body>
    <div class="topbar">
        <div class="logo">
            <h1>IBS</h1>
        </div>
        <div class="menu">
            <a href="welcome.php">Home</a>
            <div class="dropdown1">
            <button onclick="myFunction1()" class="dropbtn1">About</button>
                <div id="myDropdown1" class="dropdown-content1">
                    <a href="about.php">About</a>
                    <a href="">Goals</a>
                    <a href="">ss</a>
                    <a href="">ss</a>
                </div>
            </div>
            <div class="dropdown2">
            <button onclick="myFunction2()" class="dropbtn2">Services</button>
                <div id="myDropdown2" class="dropdown-content2">
                    <a href="check_balance.php">View Balance</a>
                    <a href="deposit.php">Deposit</a>
                    <a href="register.php">Create Account</a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="inner-content">
            <h1>Deposit Money</h1>
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="post">
                <input type="number" name="deposit_amount" step="0.01" placeholder="Amount to Deposit" required><br>
                <button type="submit">Deposit</button>
            </form>
            <a href="check_balance.php">Back to Check Balance</a>
        </div>
    </div>
    <script>
        function myFunction1() {
            document.getElementById("myDropdown1").classList.toggle("show");
        }

        function myFunction2() {
            document.getElementById("myDropdown2").classList.toggle("show");
        }

            window.onclick = function(event) {
        if (!event.target.matches('.dropbtn1')) {
            var dropdowns = document.getElementsByClassName("dropdown-content1");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove('show');
            }
        }
        if (!event.target.matches('.dropbtn2')) {
            var dropdowns = document.getElementsByClassName("dropdown-content2");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove('show');
            }
        }
    };
</script>
</body>
</html>

