<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service_requests";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $fullName = $conn->real_escape_string(trim($_POST['fullName']));
    $loanOption = $conn->real_escape_string(trim($_POST['loanOption']));
    $chosenPlan = $conn->real_escape_string(trim($_POST['chosenPlan']));
    $customPlanText = isset($_POST['customPlanText']) ? $conn->real_escape_string(trim($_POST['customPlanText'])) : null;

    // Set up the upload directory
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Initialize file upload variables
    $fileName = '';
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
        $fileName = basename($_FILES['fileUpload']['name']);
        $filePath = $uploadDir . $fileName;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            // Debug: Successful file upload
            echo "File uploaded successfully: " . htmlspecialchars($fileName) . "<br>";
        } else {
            // Debug: Error moving the uploaded file
            echo "Error moving the uploaded file.<br>";
        }
    } else {
        // Debug: No file uploaded or error in upload
        echo "No file uploaded or error occurred during file upload.<br>";
    }

    // Insert data into the database
    $sql = "INSERT INTO requests (full_name, loan_option, chosen_plan, custom_plan, file_name)
            VALUES ('$fullName', '$loanOption', '$chosenPlan', '$customPlanText', '$fileName')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
