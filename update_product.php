<?php
include 'db_connection.php';

//Function for when save changes is clicked it updates 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // To update the database
    $sql = "UPDATE items SET item_name = '$productName', price = '$price', quantity = '$quantity' WHERE item_id = $productId";

    if ($conn->query($sql) === TRUE) {
        // Redirects back to the stock page
        echo "<script>
                alert('Product updated successfully');
                window.location.href = 'stock.php';
              </script>";
       
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>
