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
        session_regenerate_id(true);

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
    <link rel="stylesheet" href="test.css">
    <title>Login</title>
</head>
<body>
    <div class="topbar">
        <div class="logo">
            <h1>IBS</h1>
        </div>
        <div class="menu">
            <a href="index.php">Home</a>
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
            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="post" id="accountForm">
            <h1>Login</h1>
                <input type="text" name="account_number" id="accountNumber" placeholder="Account Number" required><br>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                <button type="submit" id="sbtn">Login</button>
                <a href="register.php">Register</a>
            </form>
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
