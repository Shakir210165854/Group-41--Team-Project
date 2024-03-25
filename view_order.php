<?php
include 'db_connection.php';

// Check if the order ID and user ID are set in the URL parameters
if(isset($_GET['view_order_id']) && isset($_GET['user_id']) && isset($_GET['order_date'])) {
    // Retrieve the parameters from the URL
    $orderId = $_GET['view_order_id'];
    $userId = $_GET['user_id'];
    $orderDate = $_GET['order_date'];

    // Retrieve order details from the database
    $sql = "SELECT order_details.order_id, order_details.user_id, order_details.item_id, order_details.order_date, 
            order_details.quantity, order_details.total_price, items.item_id, items.price, items.item_name, 
            items.image, items.description, items.category, items.discount
            FROM order_details 
            INNER JOIN items ON order_details.item_id = items.item_id
            WHERE order_details.user_id = $userId AND order_details.order_date = '$orderDate'";

    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result->num_rows > 0) {
        $orders = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "No orders found for the specified user ID and order date.";
        exit();
    }
} else {
    echo "Order ID, user ID, or order date not provided.";
    exit();
}

// Retrieve user information from the database
$sqlUser = "SELECT user_id, email, first_name, surname, phone_number FROM users WHERE user_id = $userId";
$resultUser = $conn->query($sqlUser);

// Retrieve address information from the database
$sqlAddress = "SELECT address_id, user_id, street_address, city, state, postal_code FROM address WHERE user_id = $userId";
$resultAddress = $conn->query($sqlAddress);

// Check if the queries were successful
if ($resultUser && $resultAddress) {
    $user = $resultUser->fetch_assoc();
    $address = $resultAddress->fetch_assoc();
} else {
    echo "Failed to retrieve user or address information.";
    exit();
}

// Calculate the final total price
$finalTotalPrice = 0;
foreach ($orders as $order) {
    $finalTotalPrice += $order['total_price'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F3E5F5; 
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #6A1B9A; 
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #FFFFFF; 
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #E0E0E0; 
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #5e1698; 
            color: #fff; 
        }
        tr:nth-child(even) {
            background-color: #f3e8fc; 
        }
        .item-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-vertical {
            margin-top: 20px;
            width: 30%;
            border-collapse: collapse;
            background-color: #FFFFFF; 
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table-vertical th,
        .table-vertical td {
            border: 1px solid #E0E0E0; 
            padding: 12px;
            text-align: left;
        }

        .table-vertical th {
            background-color: #CE93D8; 
            color: #4527A0; 
        }

        .table-vertical tr:nth-child(even) {
            background-color: #f3e8fc; 
        }

        /* .table-vertical tr:nth-child(odd) {
            background-color: #f9f9f9;
        } */

        .table-vertical td:first-child {
            font-weight: bold;
            width: 150px;
            background-color: #5e1698; 
            color: #fff; 
        }
        .highlighted {
        background-color: #7a5a94; 
        font-weight: bold;
        color: #FFFFFF; 
        border: 2px solid #7B1FA2; 
        }
        .custom-button {
        background-color: #ad82d1; 
        color: #FFFFFF; 
        padding: 10px 20px; 
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none; 
        display: inline-block;
        transition: background-color 0.3s;
    }
    .custom-button:hover {
        background-color: #7B1FA2; 
    }
    </style>
</head>
<body>
<a href="Stock.php" class="custom-button">Back
  <!-- <button>Back</button> -->
</a>
    <h2>Order Details</h2>
    <table>
        <thead>
            <tr>
                <!-- <th>Order ID</th>
                <th>User ID</th>
                <th>Item ID</th> -->
                <th>Order Date</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Category</th>
                <th>Discount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
                <tr>
                    <!-- <td><?php echo $order['order_id']; ?></td> -->
                    <!-- <td><?php echo $order['user_id']; ?></td> -->
                    <!-- <td><?php echo $order['item_id']; ?></td> -->
                    <td><?php echo $order['order_date']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['total_price']; ?></td>
                    <td><?php echo $order['item_name']; ?></td>
                    <td><?php echo $order['price']; ?></td>
                    <!-- <td><img src="data:image/jpeg;base64,<?php echo $order['image']; ?>" alt="Item Image" width="100"></td> -->
                    <td><?php 
                    $image = base64_encode($order['image']);
                    echo '<img class="item-image" src="data:image/jpeg;base64,' . $image . '" alt="Item Image">';
                    ?></td>
                    <td><?php echo $order['description']; ?></td>
                    <td><?php echo $order['category']; ?></td>
                    <td><?php echo $order['discount']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <table class="table-vertical">
        <tbody>
            <!-- <tr>
                <td>Address ID</td>
                <td><?php echo $address['address_id']; ?></td>
            </tr>
            <tr>
                <td>User ID</td>
                <td><?php echo $user['user_id']; ?></td>
            </tr> -->
            <tr>
                <td>Street Address</td>
                <td><?php echo $address['street_address']; ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php echo $address['city']; ?></td>
            </tr>
            <tr>
                <td>State</td>
                <td><?php echo $address['state']; ?></td>
            </tr>
            <tr>
                <td>Postal Code</td>
                <td><?php echo $address['postal_code']; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $user['email']; ?></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo $user['first_name']; ?></td>
            </tr>
            <tr>
                <td>Surname</td>
                <td><?php echo $user['surname']; ?></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td><?php echo $user['phone_number']; ?></td>
            </tr>
            <tr>
                <td>Final Total Price</td>
                <td class="highlighted"><b><?php echo $finalTotalPrice; ?></b></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
