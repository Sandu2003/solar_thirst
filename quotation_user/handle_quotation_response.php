
require('db_connection.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = $_POST['response'];
    $quotation_id = $_POST['quotation_id'];

    $stmt = $conn->prepare("UPDATE quotations SET status = ?, response_date = NOW() WHERE id = ?");
    $stmt->bind_param("si", $response, $quotation_id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: customer_dashboard.php"); // Redirect to dashboard
    exit;
}
?>
