<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shift_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Σφάλμα σύνδεσης: " . $conn->connect_error);
}
?>