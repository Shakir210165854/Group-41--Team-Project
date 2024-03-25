<?php
session_start();
include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Home</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>

<body>

    <nav>

    <a class="logo" onclick="return false;">
            <img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo" />
        </a>
        <button onclick="window.location.href = 'AdminHomePage.php';">Home</button>
        <button onclick="window.location.href = 'User_accounts.php';">Users</button>
        <button onclick="window.location.href = 'Stock.php';">Stock</button>
        <button onclick="window.location.href = 'Stats.php';">Stats</button>
        <button onclick="window.location.href = 'newHome.php';">Back to main page</button>
        
        
    </nav>

    <div class='mainContent' style="color: aliceblue;">

<!-- a login button should disappear when a user is logged-in -->
<div class="login">
    <?php
    if (isset($_SESSION['user_id'])) {
        // If logged in, shows logout button
        echo '<div class="login">';
        echo '<form action="logout.php" method="post">';
        echo '<button type="submit" name="logout">Logout</button>';
        echo '</form>';
        echo '</div>';
    } else {
        // If not logged in, shows login button
        echo '<div class="login">';
        echo '<button onclick="window.location.href = \'loginpage.php\';">Login</button>';
        echo '</div>';
    }
    ?>
    <div class="Basket">
        <a onclick="window.location.href = 'shopping_basket.php';"><img src="Basket.png" alt="ATlogo"></a>
    </div>
</div>


<div class="title">
    <h3> TODO </h3>
</div>

<?php

// Performs the query
$query = "SELECT item_id, item_name, description, price, image, quantity
          FROM items
          WHERE quantity <= 10 OR quantity = 0";

$result = $conn->query($query);

echo '<div class="items-container">';
while ($row = $result->fetch_assoc()) {
    echo '<div class="item">';
    // Displays item information
    $image = base64_encode($row['image']);
    echo '<img src="data:image/jpeg;base64,' . $image . '" alt="Item Image">';
    echo '<div class="item-name">' . $row['item_name'] . '</div>';
    echo '<div class="item-description">' . $row['description'] . '</div>';
    echo '<div class="item-price">£' . $row['price'] . '</div>';

    // Check if quantity is 0
    if ($row['quantity'] == 0) {
        echo '<label style="color: red;">Out of Stock</label>';
    } elseif ($row['quantity'] <= 10) {
        echo '<label style="color: orange;">Low in Stock</label>';
        echo '<label> '. $row['quantity'] .' </label>';
    } else {
        echo '<label for="quantity">Quantity:</label>';
        // If user is logged in shows add to basket
        if (isset($_SESSION['user_id'])) {
            // Form to add to cart if user logged in
            echo '<form method="post" action="add_to_cart.php">';
            echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
            echo '<input type="hidden" name="item_name" value="' . $row['item_name'] . '">';
            echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
            echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
            // Set the maximum quantity to the available quantity
            echo '<input type="number" name="quantity" id="quantity" min="1" max="' . $row['quantity'] . '" value="1" style="width: 50%;">';
            echo '<button type="submit" name="add_to_cart">Add to Basket</button>';
            echo '</form>';
        } else {
            echo '<div style="margin-top: 10px;"></div>';
            //if user is not logged in login button is shown
            echo '<button onclick="window.location.href = \'loginpage.php\';">Login to purchase</button>';
        }
    }

    echo '</div>';
}
echo '</div>';
?>



</div>

</body>

</html>
