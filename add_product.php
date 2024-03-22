<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $discount = $_POST['discount'];

    // Check if file is uploaded
    if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Read image file into a variable
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);

        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO items (item_name, price, quantity, description, category, image, discount) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("sdissss", $itemName, $price, $quantity, $description, $category, $imageData, $discount);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>
                    alert('Product added successfully');
                    window.location.href = 'stock.php';
                  </script>";
        } else {
            echo "Error adding product: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
} else {
    echo "Invalid request.";
}
?>
