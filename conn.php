<?php
$servername = "168.138.113.119";   // or 127.0.0.1
$username   = "AllUre";
$password   = "AllUreAdmin2025";
$dbname     = "allure_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "✅ Connected successfully";
?>