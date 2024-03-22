<?php
include 'db_connection.php';

// Check if the delete_order_id parameter is set in the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_order_id'])) {
    // Sanitize the input to prevent SQL injection
    $orderId = $_POST['delete_order_id'];

    // Prepare and execute the SQL query to delete the order
    $sql = "DELETE FROM order_details WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $orderId);

    if ($stmt->execute()) {
        // Order deleted successfully, redirect back to the order details page
        echo "<script>alert('Order deleted successfully');</script>";
        header("Location: stock.php");
        exit();
    } else {
        // Error occurred while deleting the order
        echo "<script>alert('Error deleting order: " . $conn->error . "');</script>";
    }
} else {
    // If delete_order_id parameter is not set, redirect back to the order details page
    header("Location: stock.php");
    exit();
}
?>