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
          <button onclick="window.location.href = 'loginpage.php';">login</button>
      </div>


      <div class="title">
            
            <h4>Basket</h4>
      </div>
      
      <?php
include('db_connection.php');

// Fetch data from the shopping_cart table
$sql = "SELECT shopping_cart.*, items.item_name, items.description, items.price, image.image_data
        FROM shopping_cart
        INNER JOIN items ON shopping_cart.item_id = items.item_id
        INNER JOIN image ON shopping_cart.image_id = image.image_id";
$result = $conn->query($sql);

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
}



$conn->close();
?>






    </div>
</body>
</html>