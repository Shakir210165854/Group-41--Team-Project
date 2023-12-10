<?php
session_start();
include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
    <nav>


    </nav>

    <div class="mainContent">


      <div class="loginX">
          <button onclick="window.location.href = 'Products.php';">Back</button>
          <!-- <button onclick="window.location.href = 'loginpage.php';">login</button> -->
          <?php
        if (isset($_SESSION['user_id'])) {
            // If logged in, show logout button
            echo '<div class="login">';
            echo '<form action="logout.php" method="post">';
            echo '<button type="submit" name="logout">Logout</button>';
            echo '</form>';
            // echo '<button onclick="window.location.href = \'logout.php\';">Logout</button>';
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
}else{
    // guest user id jut for now
    $userID = 1; 
}

// Fetch data from the shopping_cart table
$sql = "SELECT shopping_cart.*, items.item_name, items.description, items.price, image.image_data
        FROM shopping_cart 
        INNER JOIN items ON shopping_cart.item_id = items.item_id
        INNER JOIN image ON shopping_cart.image_id = image.image_id
        WHERE shopping_cart.user_id = '$userID'";
$result = $conn->query($sql);

  // holds the total price 
  $totalPrice = 0;

// Display the fetched data
while ($row = $result->fetch_assoc()) {
    echo '<div class="Basket">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" alt="Product Image">';
    echo '<div class="Basket-content">';
    echo '<div class="Basket-name">' . $row['item_name'] . '</div>';
    echo '<div class="Basket-description">' . $row['description'] . '</div>';
    echo '<div class="Basket-price">$' . $row['price'] . '</div>';
    echo '</div>';

    echo '<form method="post" action="delete_item.php">';
    echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
    echo '<button class="delete-button" type="submit" name="delete_item">Delete</button>';
    echo '</div>';
    echo '</form>';

      // adds the price for each item
      $totalPrice += $row['price'];
}

// Display total price and Buy button
echo '<div class="total-price" style="color: white; font-weight: bold;">Total: $' . $totalPrice . '</div>';
echo '<form method="post" action="delete_item.php">';
echo '<button class="buy-button" type="submit" name="buy_items">Buy</button>';
echo '</form>';



$conn->close();
?>






    </div>
</body>
</html>