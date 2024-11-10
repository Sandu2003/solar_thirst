<?php
// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if we are adding a new step
if (isset($_POST['new-step-title']) && isset($_POST['new-step-description'])) {
    $step_title = $_POST['new-step-title'];
    $description = $_POST['new-step-description'];

    // Insert new step into the database
    $sql = "INSERT INTO process_flow_steps (step_title, description, step_order) VALUES (?, ?, (SELECT IFNULL(MAX(step_order), 0) + 1 FROM process_flow_steps))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $step_title, $description);

    if ($stmt->execute()) {
        echo "New step added successfully!";
    } else {
        echo "Error adding step: " . $stmt->error;
    }

    $stmt->close();
}

// Check if we are updating an existing step
elseif (isset($_POST['step_id']) && isset($_POST['description'])) {
    $step_id = $_POST['step_id'];
    $description = $_POST['description'];

    // Update the description of the specified step
    $sql = "UPDATE process_flow_steps SET description = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $description, $step_id);

    if ($stmt->execute()) {
        echo "Step updated successfully!";
    } else {
        echo "Error updating step: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
