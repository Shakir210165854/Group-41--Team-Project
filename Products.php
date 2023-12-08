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
<div class= "header-con">
    <div class="search">

        <form method="post" action="">
            <input class="searchB"type="text" placeholder="Search..." name="search">
            <button name="submit">Search</button>
        </form>

        <div class="login">
            <button onclick="window.location.href = 'loginpage.php';">login</button>
        </div>
    </div>
</div>
    <div class="title">
        <h3></h3>
        <h3>Products</h3>
        <a onclick="window.location.href = 'shopping_basket.php';"><img src="Basket.png" alt="ATlogo"></a>
    </div>
    <div class="stock">
<?php
 if (isset($_POST['submit'])) {
    // If search form is submitted

    $search = mysqli_real_escape_string($conn, $_POST['search']);

    // Modify SQL query to include a WHERE clause for searching
    $sql = "SELECT items.*, image.image_data FROM items
            INNER JOIN image ON items.item_id = image.item_id
            WHERE items.item_name LIKE '%$search%'";

    $result = $conn->query($sql);

    // echo '<h1 class="title">Search Results</h1>';
    if ($result->num_rows === 0) {
        echo '<p>Item not found.</p>';
    }
}else {


    $sql = "SELECT items.*, image.image_id, image.image_data FROM items
    INNER JOIN image ON items.item_id = image.item_id";
$result = $conn->query($sql);


// echo '<h1 class="title">Products</h1>';
}
// Add a container to hold the items
echo '<div class="items-container">';

// Loop through the results and display product information
while ($row = $result->fetch_assoc()) {
    echo '<div class="item">';
    $imageData = base64_encode($row['image_data']);
    echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="Item Image">';
    echo '<div class="item-name">' . $row['item_name'] . '</div>';
    echo '<div class="item-description">' . $row['description'] . '</div>';
    echo '<div class="item-price">£' . $row['price'] . '</div>';

    echo '<form method="post" action="add_to_cart.php">';
    echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
    // echo '<input type="hidden" name="image_id" value="' . $row['image_id'] . '">';
    echo '<input type="hidden" name="item_name" value="' . $row['item_name'] . '">';
    echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
    echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
    echo '<button type="submit" name="add_to_cart">Add to Basket</button>';
    echo '</form>';
    echo '</div>';
}

echo '</div>'; // Close the items container

?>
    </div>

    </div>
        


</body>
</html>