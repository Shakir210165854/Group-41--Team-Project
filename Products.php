<?php include ('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"/> -->
    
</head>
<style><?php include 'stylesheet.css'; ?></style>


<body>
    <nav>
        <a class="logo" onclick="return false;"><img src="https://i.ibb.co/ZBsn56k/ATlogo.jpg" alt="ATlogo"></a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <button onclick="window.location.href = 'myAccount.php';">My Account</button>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>
    
    <div class='mainContent' style="color: aliceblue;">
    
    <div class="search">
        <input class="searchB"type="text" placeholder="Search..." name="search">
        <button name="submit">Search</button>
        
        <button id="log-in"onclick="window.location.href = 'loginpage.php';">login</button>

    </div>



<?php

$sql = "SELECT items.*, image.image_data FROM items
        INNER JOIN image ON items.item_id = image.item_id";
$result = $conn->query($sql);

echo '<h1 class="title">Products</h1>';

// Add a container to hold the items
echo '<div class="items-container">';

// Loop through the results and display product information
while ($row = $result->fetch_assoc()) {
    echo '<div class="item">';
    $imageData = base64_encode($row['image_data']);
    echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Item Image">';
    echo '<div class="item-name">' . $row['item_name'] . '</div>';
    echo '<div class="item-description">' . $row['quantity'] . '</div>';
    echo '<div class="item-price">£' . $row['price'] . '</div>';
    echo '</div>';
}

echo '</div>'; // Close the items container

?>

    </div>
        


</body>
</html>