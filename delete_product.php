<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product_id'])) {
    $productId = $_POST['delete_product_id'];

    $sql = "DELETE FROM items WHERE item_id = $productId";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product deleted successfully');</script>";
        header("Location: Stock.php");
    } else {
        echo "<script>alert('Error deleting product: " . $conn->error . "');</script>";
    }
}
?>
