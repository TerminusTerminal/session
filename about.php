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
    <link rel="stylesheet" href="test.css">
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
                    <a href="javascript:void(0)">About and Contacts</a>
                    <a href="javascript:void(0)">Goals and Insights</a>
                    <a href="javascript:void(0)">News and Stories</a>
                    <a href="javascript:void(0)">Technology</a>
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
    <div id="content-top">
      <div id="inner-content">
        <h1> About Us </h1>
        <div id="sub-content">
          <P>In a constantly evolving global economy, we adhere to honesty, efficiency, and security. Delivering Efficient, Fast and Secure services adds to the integrity of our business, helping local businesses with their growth.</P>
        </div>
        <h1>Our Business</h1>
        <div id="sub-content">
          <P>We are a local Integrated Banking System that aims to make transactions easier and faster with unparalleled security.</P>
        </div>
        <h1>Presence</h1>
        <div id="sub-content">
          <P>Our presence are within the local communities that we are going to serve that doesn't need employees to process transactions.</P>
        </div>
      </div>
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