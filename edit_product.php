
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Product</title>
            <style>
        /* CSS styles for add product form */
        body {
            font-family: Arial, sans-serif;
            background-color: #a3a3a3;
            margin: 0;
            padding: 0;
        }
 
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 2px solid #6A5ACD;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        .section {
            margin-bottom: 20px;
        }
 
        h2 {
            margin-top: 0;
            color: #6A5ACD;
        }
 
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
 
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
 
        button {
            padding: 10px 20px;
            background-color: #6A5ACD;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
 
        button:hover {
            background-color: #483D8B;
        }
 
        button + button {
            margin-left: 10px;
            background-color: #ccc;
            color: #333;
        }
 
        button + button:hover {
            background-color: #999;
        }
    </style>
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
