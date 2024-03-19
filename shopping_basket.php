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
    <link rel="stylesheet" type="text/css" href="basket.css" />
</head>
<script>
function buyButtonClick() {
  // Display an alert
  alert("Thank you for your purchase!");
 
  // Redirect to the home page
  window.location.href = "newHome.php";
}
</script>
<body>
<nav>

<a class="logo" onclick="return false;"><img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo"></a>
<button onclick="window.location.href = 'newHome.php';">Home</button>
<?php
if (isset($_SESSION['user_id'])) {
echo ' <button onclick="window.location.href = \'myAccount.php\';">My Account</button>';
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
$sql = "SELECT shopping_cart.*, items.item_name, items.description, items.price, items.image
        FROM shopping_cart
        INNER JOIN items ON shopping_cart.item_id = items.item_id

        WHERE shopping_cart.user_id = '$userID'";
$result = $conn->query($sql);
 
  // holds the total price
  $totalPrice = 0;
 
// Display the fetched data
while ($row = $result->fetch_assoc()) {
    echo '<div class="Basket">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Product Image">';
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
 
echo '<div class="total-price" style="color: white; font-weight: bold;">Total: $' . $totalPrice . '</div>';
 
echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';
echo '<table>';
echo '<tr><td><label for="address"> Address: </label></td>';
echo '<td><input type="text" name="address" required></td></tr>';
 
echo '<tr><td><label for="card_number">Card Number:</label></td>';
echo '<td><input type="text" name="card_number" pattern="\d{16}" title="Enter a 16-digit card number" required></td></tr>';
 
echo '<tr><td><label for="ccv">CCV:</label></td>';
echo '<td><input type="text" name="ccv" pattern="\d{3}" title="Enter a 3-digit CCV" required></td></tr>';
 
echo '</table>';
    // Display total price and Buy button
echo '<form method="post" action="delete_item.php">';
echo '<button class="buy-button" type="submit" name="buy_basket_items" onclick="buyButtonClick()">Buy</button>';
echo '</form>';
echo '</form>';
 
 
 
 
$conn->close();
?>
 
 
 
 
 
 
    </div>
</body>
</html>