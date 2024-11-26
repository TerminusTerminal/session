<?php
session_start();

// log in checker
$logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Welcome</title>
</head>
<body>
    <div class="topbar">
        <div class="logo">
            <h1>IBS</h1>
        </div>
        <div class="menu">
            <a href="javascript:void(0)">Home</a>
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
        <?php if ($logged_in): ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['account_holder_name']); ?>!</p>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <p>Welcome, Guest!</p>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
    <div class="content">
        <h1>Integrated Banking System</h1>
        <div class="login-checker">
        <?php if (!$logged_in): ?>
            <p>Please <a href="login.php">login</a> or <a href="register.php">create an account</a> to access full features.</p>
        <?php endif; ?>
    </div>
    </div>
    <script>
        function myFunction1() {
          document.getElementById("myDropdown1").classList.toggle("show1");
        }
        
        function myFunction2() {
          document.getElementById("myDropdown2").classList.toggle("show2");
        }
        
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn1')) {
                var dropdowns = document.getElementsByClassName("dropdown-content1");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show1')) {
                        openDropdown.classList.remove('show1');
                    }
                }
            }
            if (!event.target.matches('.dropbtn2')) {
                var dropdowns = document.getElementsByClassName("dropdown-content2");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show2')) {
                        openDropdown.classList.remove('show2');
                    }
                }
            }
        }
    </script>
</body>
</html>

