<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item'])) {
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);

    // Delete the item from the shopping_cart table
    $delete_sql = "DELETE FROM shopping_cart WHERE item_id = '$item_id'";
    
    if ($conn->query($delete_sql) === TRUE) {
        // Successful deletion
        header('location:shopping_basket.php');
    } else {
        // Error in deletion
        echo 'Error deleting item: ' . $conn->error;
    }
}

$conn->close();
?>
