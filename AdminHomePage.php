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
        
        
    </nav>


    <div class='mainContent' style="color: aliceblue;">
        
<!-- a login button should disappear when a user is logged-in -->
        <div class="login">
            <!-- <button onclick="window.location.href = 'loginpage.php';">login</button> -->
            <?php
            echo '<div class="login">';
            echo '<form action="logout.php" method="post">';
            echo '<button type="submit" name="logout">Logout</button>';
            echo '</form>';
            // echo '<button onclick="window.location.href = \'logout.php\';">Logout</button>';
            echo '</div>';
        ?>
        </div>    


        
    <h1 class="title">AlphaTech</h1>

    <?php
        // Assuming you have a database connection established and stored in the $conn variable

// Perform the query
$query = "SELECT items.item_id, items.item_name, items.description, items.price, items.image, SUM(order_details.quantity) AS total_quantity_sold
FROM order_details
JOIN items ON order_details.item_id = items.item_id

GROUP BY items.item_id
ORDER BY total_quantity_sold DESC
LIMIT 4";

$result = $conn->query($query);

// Display the results
echo '<div class="items-container">';
while ($row = $result->fetch_assoc()) {
    echo '<div class="item">';
    // Display the item information, including the image
    $image = base64_encode($row['image']);
    echo '<img src="data:image/jpeg;base64,' . $image . '" alt="Item Image">';
    echo '<div class="item-name">' . $row['item_name'] . '</div>';
    echo '<div class="item-description">' . $row['description'] . '</div>';
    echo '<div class="item-price">£' . $row['price'] . '</div>';

    // Add the form code for adding to the shopping cart
    echo '<form method="post" action="add_to_cart.php">';
    echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
    echo '<input type="hidden" name="item_name" value="' . $row['item_name'] . '">';    
    echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
    echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
    echo '<button type="submit" name="add_to_cart">Add to Basket</button>';
    echo '</form>';

    echo '</div>';
}
echo '</div>';



    ?>

</body>

</html>
