<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "solar_system"; // The name of your database

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch upgrade requests
$upgradeQuery = "SELECT * FROM upgrade_downgrade_requests WHERE upgrade_option = 'upgrade'";
$upgradeResult = $conn->query($upgradeQuery);

// SQL query to fetch downgrade requests
$downgradeQuery = "SELECT * FROM upgrade_downgrade_requests WHERE upgrade_option = 'downgrade'";
$downgradeResult = $conn->query($downgradeQuery);

// Fetch data and output as an array or other format
$upgradeRequests = [];
if ($upgradeResult->num_rows > 0) {
    while ($row = $upgradeResult->fetch_assoc()) {
        $upgradeRequests[] = $row;
    }
} else {
    $upgradeRequests = [];
}

$downgradeRequests = [];
if ($downgradeResult->num_rows > 0) {
    while ($row = $downgradeResult->fetch_assoc()) {
        $downgradeRequests[] = $row;
    }
} else {
    $downgradeRequests = [];
}

// Return data as JSON or process it
echo json_encode([
    'upgrade_requests' => $upgradeRequests,
    'downgrade_requests' => $downgradeRequests
]);

// Close connection
$conn->close();
?>
