<?php
// Database connection details
$host = 'localhost';        // Update if needed
$username = 'root';         // Update if your username is different
$password = '';             // Update if your password is different
$database = 'service_requests'; // Replace with your actual database name

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to handle file upload and return binary data
function getFileData($file) {
    if ($file['error'] === UPLOAD_ERR_OK) {
        return file_get_contents($file['tmp_name']);
    }
    return null;
}

// Capture form data and handle file uploads
$requestType = $_POST['requestType'];
$fullName = $_POST['fullName'] ?? null;
$idCard = isset($_FILES['idCard']) ? getFileData($_FILES['idCard']) : null;
$loanOption = $_POST['loanOption'] ?? 'no';
$paymentReceipt = ($loanOption == 'no' && isset($_FILES['paymentReceipt'])) ? getFileData($_FILES['paymentReceipt']) : null;
$loanReceipt = ($loanOption == 'yes' && isset($_FILES['loanReceipt'])) ? getFileData($_FILES['loanReceipt']) : null;
$chosenPlan = $_POST['chosenPlan'] ?? 'company_decide';
$customPlanText = $_POST['customPlanText'] ?? null;
$lightBill = isset($_FILES['lightBill']) ? getFileData($_FILES['lightBill']) : null;

// Insert data into the database
$stmt = $conn->prepare("INSERT INTO service_requests (request_type, full_name, id_card, loan_option, payment_receipt, loan_receipt, chosen_plan, custom_plan_text, light_bill) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $requestType, $fullName, $idCard, $loanOption, $paymentReceipt, $loanReceipt, $chosenPlan, $customPlanText, $lightBill);

if ($stmt->execute()) {
    echo "Request submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
