<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
<div class="container">
    <div class="section">
        <h2>Add Product</h2>
        <form method="post" action="add_product.php" enctype="multipart/form-data"> <!-- Form action points to add_product.php -->
            <label for="item_name">Product Name:</label>
            <input type="text" id="item_name" name="item_name" required><br><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" required><br><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50"></textarea><br><br>
            <label for="category">Category:</label>
            <select id="category" name="category">
            <?php
            include 'db_connection.php';

            // Query to fetch categories from the database
            $categorySql = "SELECT DISTINCT category FROM items";
            $categoryResult = $conn->query($categorySql);
            
            // Check if the query was successful
            if (!$categoryResult) {
                echo "Error fetching categories: " . $conn->error;
            }
            if ($categoryResult->num_rows > 0) {
                while ($categoryRow = $categoryResult->fetch_assoc()) {
                    $selected = ($categoryRow['category'] == $row['category']) ? 'selected' : '';
                    echo "<option value='" . $categoryRow['category'] . "' $selected>" . $categoryRow['category'] . "</option>";
                }
            }
            ?>
            </select><br><br>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required><br><br>
            <label for="discount">Discount:</label>
            <input type="number" id="discount" name="discount" min="0" step="0.01" value="<?php echo $row['discount']; ?>"><br><br>
            <button type="submit" name="add_product">Add Product</button>
            <button onclick="window.location.href = 'stock.php';">Back to panel</button>
        </form>
    </div>
</div>

</body>
</html>