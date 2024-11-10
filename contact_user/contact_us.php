<?php
// Database connection
$servername = "localhost";
$username = "root";  // Update with your MySQL username
$password = "";      // Update with your MySQL password
$dbname = "contact_us_db";  // Make sure the database exists

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables and initialize with empty values
$name = $email = $subject = $message = "";

// When the form is submitted, handle the input and store it in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Prepare and bind (to prevent SQL injection)
    $stmt = $conn->prepare("INSERT INTO messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<p>Message sent successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css"> <!-- Adjust the path to your CSS file -->
</head>
<body>
    <div class="sidebar">
        <h2>Customer Dashboard</h2>
        <nav>
            <ul>
                <li><a href="service_request.html">Service Request</a></li>
                <li><a href="view_quotation.html">View Quotation</a></li>
                <li><a href="complaints.html">Complaints</a></li>
                <li><a href="process_flow.html">Process Flow</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </nav>
    </div>

    <div class="content">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out to us. We’re here to help you with all of your needs.</p>
        
        <section class="contact-info">
            <h3>Our Contact Information</h3>
            <p><strong>Email:</strong> support@solarthirst.com</p>
            <p><strong>Phone:</strong> +123-456-7890</p>
            <p><strong>Address:</strong> 123 Solar Ave, Green City, Country</p>
            <p><strong>Office Hours:</strong> Monday - Friday, 9:00 AM - 5:00 PM</p>
        </section>

        <section class="contact-form">
            <h3>Send Us a Message</h3>
            <form action="contact_us.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
                
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                
                <button type="submit">Send Message</button>
            </form>
        </section>
    </div>
</body>
</html>
