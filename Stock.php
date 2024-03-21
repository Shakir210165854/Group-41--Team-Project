<?php include 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: 'Arial Rounded MT';
            margin: 5px;
            padding: 5px;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: lightgray;
            border: 1px solid solid black;
            border-radius: 5px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .section-header h2 {
            margin: 2px;
            font-size: 24px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table th,
        .table td {
            padding: 10px;
            border: 1px solid black;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .table td {
            background-color: whitesmoke;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin-right: 10px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
<div class="section">
        <div class="section-header">
           <h2>Order Details</h2>
            <a href="#" class="btn">Add Order</a>
        </div>
        <table class="table">
        
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

            <tbody>
            <?php
            // Gets order details from the database to display

            $sql = "SELECT order_details.order_id, users.first_name, users.surname, order_details.total_price, order_details.order_date 
                    FROM order_details 
                    INNER JOIN users ON order_details.user_id = users.user_id";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["order_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . " " . $row["surname"] . "</td>";
                    echo "<td>" . $row["total_price"] . "</td>";
                    echo "<td>" . $row["order_date"] . "</td>";
                    echo "<td>";
                    // Add your action buttons here
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No orders found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="section">
        <div class="section-header">
           <h2>Stock</h2>
            <a href="add_product_form.php" class="btn">Add Product</a>
        </div>
        <table class="table">
        
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Gets items from the item database to display
            $sql = "SELECT * FROM items";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["item_id"] . "</td>";
                    echo "<td>" . $row["item_name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' action='edit_product.php'>";
                    echo "<input type='hidden' name='edit_product_id' value='" . $row["item_id"] . "' />";
                    echo "<button type='submit'>Edit</button>";
                    echo "</form>";
                    echo "<form method='post' action='delete_product.php'>";
                    echo "<input type='hidden' name='delete_product_id' value='" . $row["item_id"] . "' />";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products found</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- To go back to admin home page -->
<a href="AdminHomePage.php" class="btn">Back to panel</a>

</body>
</html>
