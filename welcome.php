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
        <a href="javascript:void(0)">Home</a>
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
    <div class="accountid">
            <?php echo htmlspecialchars($_SESSION['account_holder_name']); ?>
    </div>
    <div class="logout">
        <a href="logout.php">Logout</a>
    </div>
</div>
<div id="content-top">
    <div id="inner-content">
        <h1> Integrated Banking System </h1>
        <div id="sub-content">
          <p>Prioritizing Efficiency, Security and customer satisfaction</p>
          <p></p>
        </div>
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
