<?php
// Include database connection file
include('db_connection.php');

// Fetch complaints from the database
$query = "SELECT * FROM complaints"; // Assuming the table name is 'complaints'
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Complaints</title>
    <link rel="stylesheet" href="com.css">
</head>
<body>
    <div class="sidebar">
        <h2>Organization Dashboard</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Customer Data</a></li>
            <li><a href="#">Send Quotation</a></li>
            <li><a href="#">Reply to Complaints</a></li>
            <li><a href="#">Upgrade/Downgrade Requests</a></li>
            <li><a href="#">Process Flow</a></li>
        </ul>
    </div>

    <div class="dashboard-container">
        <div class="header">
            <div class="header-left">
                <img class="logo" src="logo.png" alt="Company Logo">
            </div>
            <div class="header-right">
                <p>Account Details</p>
            </div>
        </div>

        <div class="content">
            <h2>Reply to Complaints</h2>
            <p>Here, you can view customer complaints and respond to them. Each complaint is listed by the user's username for better identification.</p>

            <!-- Complaint Table -->
            <h3>Customer Complaints</h3>
            <table class="complaints-table">
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Username</th>
                        <th>Complaint</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are complaints in the database
                    if (mysqli_num_rows($result) > 0) {
                        // Display each complaint
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['complaint_id'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['complaint_text'] . "</td>";
                            echo "<td><button class='reply-btn' data-complaint-id='" . $row['complaint_id'] . "'>Reply</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No complaints found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <!-- Reply Form -->
            <div id="reply-section" style="display: none;">
                <h3>Respond to Complaint</h3>
                <form action="submit_reply.php" method="POST">
                    <label for="complaint-id">Complaint ID</label>
                    <input type="text" id="complaint-id" name="complaint-id" readonly>
                    
                    <label for="response">Your Reply</label>
                    <textarea id="response" name="response" required></textarea>

                    <button type="submit" class="reply-submit-btn">Send Reply</button>
                </form>
            </div>
        </div>
    </div>

    <script src="com.js"></script>
</body>
</html>
