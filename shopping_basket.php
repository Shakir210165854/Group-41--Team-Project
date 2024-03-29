<?php
session_start();
include ('db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_basket_items'])) {
    // Retrieve user_id from session or wherever it's stored
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Default user_id for guest user
        echo '<button onclick="window.location.href = \'loginpage.php\';">My Account</button>';
    }


    $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
    $ccv = mysqli_real_escape_string($conn, $_POST['ccv']);



    // Select all items from the shopping_cart table that match the user_id
    $query = "SELECT * FROM shopping_cart WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);

    // Insert selected items into order_details table
    while ($row = mysqli_fetch_assoc($result)) {
        $item_id = $row['item_id'];
        $quantity = $row['quantity'];
        $item_price = $row['price']; // Added line to get item price

        // Calculate total price for each item
        $itemTotalPrice = $item_price * $quantity;

        // Insert item into order_details table
        $insert_query = "INSERT INTO order_details (user_id, item_id, order_date, quantity, total_price)
        VALUES ('$user_id', '$item_id', NOW(), '$quantity', '$itemTotalPrice')";
        mysqli_query($conn, $insert_query);


        // Update the new quantity in DB
        $remove_stock_query = "UPDATE items SET quantity = quantity - $quantity WHERE item_id = $item_id";
        mysqli_query($conn, $remove_stock_query);
    }

    // Clear the shopping_cart for the user
    $delete_query = "DELETE FROM shopping_cart WHERE user_id = $user_id";
    mysqli_query($conn, $delete_query);


    // Log activity to the database, give date and time as well as action.
    $timestamp = date('Y-m-d H:i:s');
    $action="purchase";
    $insert_query = "INSERT INTO user_logs (user_id, timestamp, action) VALUES ('$userID', '$timestamp' , '$action')";
    mysqli_query($conn, $insert_query);


    echo '<script>alert("Thank you for your purchase!"); window.location.href = "newHome.php";</script>';


    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" type="text/css" href="basket.css" />
    <style>
        /*CSS styles for the checkout table */
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        form table {
            width: 100%;
            border-collapse: collapse;
        }

        form table td {
            padding: 5px;
        }

        form table td label {
            font-weight: bold;
            display: inline-block;
            width: 110px; 
        }

        form table td input[type="text"] {
            width: 480px;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }       


        .buy-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            width:200px;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            position:relative;
            right:200px;
        }

        .buy-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <script>
    function buyButtonClick() {
        // Form validation
        var cardNumber = document.getElementsByName('card_number')[0].value;
        var ccv = document.getElementsByName('ccv')[0].value;

        if (address === '' || cardNumber === '' || ccv === '') {
            alert("Please fill out all fields.");
            return false; // Prevent form submission if fields are not filled
        }

        // Check if card number and CCV are in correct format (you can add more validation here if needed
    }

    </script>
    <nav>
        <a class="logo" onclick="return false;">
            <img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo" />
        </a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <?php
        if (isset($_SESSION['user_id'])) {
            echo '<button onclick="window.location.href = \'myAccount.php\';">My Account</button>';
            if ($_SESSION['user_id'] == '2') { 
                echo '<button onclick="window.location.href = \'AdminHomePage.php\';">Admin page</button>';
            }
        } else {
            echo '<button onclick="window.location.href = \'loginpage.php\';">My Account</button>';
        }
        ?>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>
 
<div class="mainContent">
    <div class="loginX">
        <button onclick="window.location.href = 'Products.php';">Back</button>
        <?php
        if (isset($_SESSION['user_id'])) {
            // If logged in, show logout button
            echo '<div class="login">';
            echo '<form action="logout.php" method="post">';
            echo '<button type="submit" name="logout">Logout</button>';
            echo '</form>';
            echo '</div>';
        } else {
            // If not logged in, show login button
            echo '<div class="login">';
            echo '<button onclick="window.location.href = \'loginpage.php\';">Login</button>';
            echo '</div>';
        }
        ?>
    </div>
 
    <div class="title">       
        <h4>Basket</h4>
    </div>

    <?php
    include('db_connection.php');

    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
    } else {
        // guest user id for now
        $userID = 1;
    }

    // Fetch data from the shopping_cart table
    $sql = "SELECT shopping_cart.*, items.item_name, items.description, items.price, items.image
            FROM shopping_cart
            INNER JOIN items ON shopping_cart.item_id = items.item_id
            WHERE shopping_cart.user_id = '$userID'";
    $result = $conn->query($sql);

    // Total price calculation
    $totalPrice = 0;

    // Display the fetched data
    while ($row = $result->fetch_assoc()) {
        echo '<div class="Basket">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Product Image">';
        echo '<div class="Basket-content">';
        echo '<div class="Basket-name">' . $row['item_name'] . '</div>';
        echo '<div class="Basket-description">' . $row['description'] . '</div>';
        echo '<div class="Basket-quantity">Quantity: ' . $row['quantity'] . '</div>';
        $itemTotalPrice = $row['price'] * $row['quantity'];
        echo '<div class="Basket-price">$' . $itemTotalPrice . '</div>';
        echo '</div>';

        echo '<form method="post" action="delete_item.php">';
        echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
        echo '<button class="delete-button" type="submit" name="delete_item">Delete</button>';
        echo '</div>';
        echo '</form>';

        // Calculate total price
        $totalPrice += $itemTotalPrice;
    }

    // Display total price and Buy button
    echo '<div class="total-price" style="color: white; font-weight: bold;">Total: $' . number_format($totalPrice, 2) . '</div>';


    $query = "SELECT COUNT(*) AS num_items FROM shopping_cart WHERE user_id = $userID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $num_items = $row['num_items'];

    if ($num_items == 0) {
        echo "<p>Your basket is empty. Please add items before proceeding with the purchase.</p>";
    } else {

        // GEt user ID and the address from DB
        $userID = $_SESSION['user_id'];
        $query = "SELECT * FROM address WHERE user_id = $userID";
        $result = mysqli_query($conn, $query);
        $user_address = mysqli_fetch_assoc($result);

        // Display address from DB with option to edit.
        echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
        echo '<table>';

        echo '<tr><td><label for="address"> Address: </label></td>';
        echo '<td><input type="text" name="address" value="' . $user_address['street_address'] . '" required></td></tr>';

        echo '<tr><td><label for="city">City:</label></td>';
        echo '<td><input type="text" name="city" value="' . $user_address['city'] . '" required></td></tr>';

        echo '<tr><td><label for="state">State:</label></td>';
        echo '<td><input type="text" name="state" value="' . $user_address['state'] . '" required></td></tr>';

        echo '<tr><td><label for="postal_code">Postal Code:</label></td>';
        echo '<td><input type="text" name="postal_code" value="' . $user_address['postal_code'] . '" required></td></tr>';

        echo '<tr><td><label for="card_number">Card Number:</label></td>';
        echo '<td><input type="text" name="card_number" pattern="\d{16}" title="Enter a 16-digit card number" required></td></tr>';

        echo '<tr><td><label for="ccv">CCV:</label></td>';
        echo '<td><input type="text" name="ccv" pattern="\d{3}" title="Enter a 3-digit CCV" required></td></tr>';

        echo '</table>';
        // Buy button
        echo '<button class="buy-button" type="submit" name="buy_basket_items" onclick="buyButtonClick()">Buy</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
    // Close database connection
    $conn->close();
    ?>
</div>
</body>
</html>

   