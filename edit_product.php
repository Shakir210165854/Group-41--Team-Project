
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Product</title>
        </head>
        <body>
        
        <?php
        //function for when edit is clicked taks you to the edit page to make changes
            include 'db_connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_product_id'])) {
                $productId = $_POST['edit_product_id'];

                // Get data from the database
                $sql = "SELECT * FROM items WHERE item_id = $productId";
                $result = $conn->query($sql);

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
   
        ?>
        
        <div class="container">
             <!--form to edit the information -->
            <h2>Edit Product</h2>
            <form method="post" action="update_product.php">
                <input type="hidden" name="product_id" value="<?php echo $row['item_id']; ?>">
                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $row['item_name']; ?>"><br><br>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $row['price']; ?>"><br><br>
                <label for="quantity">Quantity:</label>
                <input type="text" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>"><br><br>
                <button type="submit">Save Changes</button>
                <button onclick="window.location.href = 'Stock.php';">Back to panel</button>
            </form>
        </div>
        </body>
        </html>
        <?php
    } 
} else {
    echo "Invalid request";
}
?>
