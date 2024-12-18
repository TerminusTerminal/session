<?php
require 'db.php';
session_start();

if (!isset($_SESSION['account_number'])) {
    header('Location: login.php');
    exit;
}

// fetch that thing
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
    <link rel="stylesheet" href="test.css">
    <title>Check Balance</title>
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
                    <a href="about.php">About and Contacts</a>
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
    </div>
    <div class="content">
        <div class="inner-content">
            <h1>Your Account Balance</h1>
            <p>Current Balance: $<?php echo number_format($balance, 2); ?></p>
            <a href="welcome.php">Back to Dashboard</a>
        </div>
    </div>
    <footer class="home-footer">
    <div class="concerns-footer">
      <div class="concerns-divider">
        <ul>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Privacy, Cookies & Security</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Data Collection Concerns</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Data Access Agreements</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Report Frauds</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Accessibility</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">About Integrated Banking System</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Other Concerns</a>
            </span>
          </li>
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Copyright</a>
            </span>
          </li>
        </ul>
      </div>
    </div>
    <div class="footer-social-icons">
      <div class="social-icons">
        <ul>
          <li>
            <a class="icon-facebook social-icons" href="javascript:void(0)"></a>
          </li>
          <li>
            <a class="icon-linkedin social-icons" href="javascript:void(0)"></a>
          </li>
          <li>
            <a class="icon-instagram social-icons" href="javascript:void(0)"></a>
          </li>
          <li>
            <a class="icon-pinterest social-icons" href="javascript:void(0)"></a>
          </li>
          <li>
            <a class="icon-youtube social-icons" href="javascript:void(0)"></a>
          </li>
          <li>
            <a class="icon-twitter social-icons" href="javascript:void(0)"></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="legal-concerns">

    </div>
    <div class="copyright">

    </div>
  </footer>
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
