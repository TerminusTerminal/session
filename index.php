<?php
session_start();

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
        <?php if ($logged_in): ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['account_holder_name']); ?>!</p>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <p>Welcome, Guest!</p>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </div>
    <div id="content-top">`
        <div id="inner-content">
        <h1>Integrated Banking System</h1>
            <div id="sub-content">
                <p>Prioritizing Efficiency, Security and customer satisfaction</p>
                <p></p>
            </div>
        </div>
    </div>
    <div class="login-checker">
        <?php if (!$logged_in): ?>
            <p>Please <a href="login.php">login</a> or <a href="register.php">create an account</a> to access full features.</p>
        <?php endif; ?>
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
          <li class="cs-footer">
            <span>
              <a href="javascript:void(0)">Others</a>
            </span>
          </li>
        </ul>
      </div>

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

