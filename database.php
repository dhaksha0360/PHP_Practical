<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "medical_prescription_system";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>