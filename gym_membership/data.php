<?php
// Database config
$host = 'localhost';
$db   = 'gym_membership';
$user = 'root'; // or your DB username
$pass = '';     // or your DB password

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get POST data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$card_number = $_POST['card_number'];
$cvv = $_POST['cvv'];
$address = $_POST['address'];
$ic_number = $_POST['ic_number'];
$email = $_POST['email'];
$membership = $_POST['membership'];
$expiry_month = $_POST['expiry_month'];
$expiry_year = $_POST['expiry_year'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO members (name, email, membership) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $membership);

// Execute
if ($stmt->execute()) {
  echo "Membership submitted successfully!";
} else {
  echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
