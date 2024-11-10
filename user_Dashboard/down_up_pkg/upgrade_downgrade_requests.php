<?php
// Database connection details
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$customer_name = "Example Customer"; // Replace with dynamic customer name if available
$currentPackage = $_POST['currentPackage'];
$upgradeOption = $_POST['upgradeOption'];
$reason = $_POST['reason'];

// Prepare the SQL statement
$sql = "INSERT INTO upgrade_downgrade_requests (customer_name, current_package, upgrade_option, reason) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $customer_name, $currentPackage, $upgradeOption, $reason);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "Upgrade/downgrade request submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

