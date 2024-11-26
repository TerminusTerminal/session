<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
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
                    <a href="javascript:void(0)">About</a>
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
        <?php echo htmlspecialchars($_SESSION['account_holder_name']); ?>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
        <h1> Integrated Banking System </h1>
    </div>
    <script>
        function myFunction1() {
          document.getElementById("myDropdown1").classList.toggle("show1");
        }
        
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn1')) {
            var dropdowns = document.getElementsByClassName("dropdown-content1");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown1 = dropdowns[i];
              if (openDropdown1.classList.contains('show1')) {
                openDropdow1n.classList.remove('show1');
              }
            }
          }
        }

        function myFunction2() {
          document.getElementById("myDropdown2").classList.toggle("show2");
        }
        
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn2')) {
            var dropdowns = document.getElementsByClassName("dropdown-content2");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown2 = dropdowns[i];
              if (openDropdown2.classList.contains('show2')) {
                openDropdown2.classList.remove('show2');
              }
            }
          }
        }
    </script>
</body>
</html>