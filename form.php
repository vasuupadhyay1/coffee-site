<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username
$password = ""; // Default password (usually empty)
$dbname = "coffeedatabase"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contacts (name, email, age, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $email, $age, $message);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$message = $_POST['message'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
