<?php
// Include the database connection file
include('db_config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST['fullName'];
    $complaintType = $_POST['complaintType'];
    $complaintDescription = $_POST['complaintDescription'];
    
    // Handle file upload (if any)
    $supportingFiles = NULL;
    if (isset($_FILES['supportingFiles']) && $_FILES['supportingFiles']['error'] == 0) {
        $fileTmpName = $_FILES['supportingFiles']['tmp_name'];
        $fileName = $_FILES['supportingFiles']['name'];
        $fileType = $_FILES['supportingFiles']['type'];
        
        // Define the upload directory
        $uploadDir = "uploads/";  // Make sure to create an 'uploads' folder
        $uploadPath = $uploadDir . basename($fileName);
        
        // Move the uploaded file to the desired folder
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            $supportingFiles = $uploadPath;  // Store the file path in the database
        } else {
            echo "Error uploading file.";
        }
    }

    // Prepare SQL query to insert complaint data into the database
    $sql = "INSERT INTO complaints (full_name, complaint_type, complaint_description, supporting_files)
            VALUES ('$fullName', '$complaintType', '$complaintDescription', '$supportingFiles')";
    
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
