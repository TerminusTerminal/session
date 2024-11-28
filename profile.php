<?php
require 'db.php';
session_start();

if (!isset($_SESSION['account_number'])) { 
    header('Location: login.php');
    exit;
}

try {
    $account_sql = "SELECT account_number, account_holder_name, email, balance FROM accounts WHERE account_number = :account_number";
    $account_stmt = $pdo->prepare($account_sql);
    $account_stmt->execute(['account_number' => $_SESSION['account_number']]);
    $account = $account_stmt->fetch();

    if (!$account) {
        throw new Exception("Account not found.");
    }

    $transactions_sql = "SELECT transaction_type, amount, description, transaction_date 
                         FROM transactions 
                         WHERE account_number = :account_number 
                         ORDER BY transaction_date DESC";
    $transactions_stmt = $pdo->prepare($transactions_sql);
    $transactions_stmt->execute(['account_number' => $_SESSION['account_number']]);
    $transactions = $transactions_stmt->fetchAll();
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Account Details</title>
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
      <div class="logout">
        <a href="logout.php">Logout</a>
      </div>
    </div>

    <div id="content">
        <div class="inner-content">
        <h1>Account Details</h1>
        <?php if (isset($error)) : ?>
            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
        <?php else : ?>
            <div class="account-info">
                <p><strong>Account Number:</strong> <?php echo htmlspecialchars($account['account_number']); ?></p>
                <p><strong>Account Holder Name:</strong> <?php echo htmlspecialchars($account['account_holder_name']); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($account['email']); ?></p>
                <p><strong>Balance:</strong> $<?php echo number_format($account['balance'], 2); ?></p>

        
            <h2>Transaction History</h2>
            </div>
            <?php if (!empty($transactions)) : ?>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Amount</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars(ucfirst($transaction['transaction_type'])); ?></td>
                                <td>$<?php echo number_format($transaction['amount'], 2); ?></td>
                                <td><?php echo htmlspecialchars($transaction['description']); ?></td>
                                <td><?php echo htmlspecialchars($transaction['transaction_date']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No transactions found.</p>
            <?php endif; ?>
        <?php endif; ?>
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
</body>
</html>
