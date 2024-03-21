<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        /* CSS styles for your add product form */
    </style>
</head>
<body>

<div class="container">
    <div class="section">
        <h2>Add Product</h2>
        <form method="post" action="add_product.php"> <!-- Form action points to add_product.php -->
            <label for="item_name">Product Name:</label>
            <input type="text" id="item_name" name="item_name" required><br><br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" min="0" step="0.01" required><br><br>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="0" required><br><br>
            <button type="submit" name="add_product">Add Product</button>
            <button onclick="window.location.href = 'Stock.php';">Back to panel</button>
        </form>
    </div>
</div>

</body>
</html>