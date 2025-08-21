<?php
// Create connection
$conn = new mysqli('localhost', 'allure', 'Allure@2025)*', 'allure_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>