<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO items (item_name, price, quantity) VALUES ('$itemName', '$price', '$quantity')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Product added successfully');
                window.location.href = 'stock.php';
              </script>";
    } else {
        echo "Error adding product: " . $conn->error;
    }
}
?>