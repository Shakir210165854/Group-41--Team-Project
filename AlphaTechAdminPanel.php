
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <h2>Orders</h2>
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
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>$100</td>
                        <td>Processing</td>
                        <td>
                            <a href="#">View Details</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="section">
            <div class="section-header">
                <h2>Inventory</h2>
                <a href="#" class="btn">Add Product</a>
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

                    include 'db_connection.php';

                    $sql = "SELECT * FROM items";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["item_id"] . "</td>";
                            echo "<td>" . $row["item_name"] . "</td>";
                            echo "<td>" . $row["price"] . "</td>";
                            echo "<td>" . $row["quantity"] . "</td>";
                            echo "<td>";
                            echo "<button onclick=\"editProduct(" . $row["item_id"] . ")\">Edit</button>";
                            echo "<button onclick=\"deleteProduct(" . $row["item_id"] . ")\">Delete</button>";
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

</body>
</html>