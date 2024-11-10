<?php
header('Content-Type: application/json');

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

if (isset($_POST['new-step-title']) && isset($_POST['new-step-description'])) {
    $step_title = $_POST['new-step-title'];
    $description = $_POST['new-step-description'];

    // Insert new step into the database
    $sql = "INSERT INTO process_flow_steps (step_title, description, step_order) VALUES (?, ?, (SELECT IFNULL(MAX(step_order), 0) + 1 FROM process_flow_steps))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $step_title, $description);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "New step added successfully!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error adding step: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data provided."]);
}

$conn->close();
?>
