<?php
$conn = new mysqli('localhost', 'root', '', 'allure');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



  