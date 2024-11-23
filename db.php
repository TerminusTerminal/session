<?php
$host = 'localhost'; // Replace with your database host
$db = 'simple_payments'; // Database name
$user = 'root';      // Database username
$pass = '1234';          // Database password
$port = 3308;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
