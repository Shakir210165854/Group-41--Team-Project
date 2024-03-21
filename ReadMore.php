<?php include('db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadMore</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
</head>
<body>

<?php

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Assuming you have established a database connection already

// Check if item_id is set in the query parameters
if (isset($_GET['item_id'])) {
    // Retrieve item_id from the query parameters
    $item_id = $_GET['item_id'];

    // Fetch item information from the database using item_id
    $query = "SELECT * FROM items WHERE item_id = $item_id";
    $result = $conn->query($query);

    // Check if there is a result
    if ($result && $result->num_rows > 0) {
        // Fetch item details
        $row = $result->fetch_assoc();

        // Display item details
        echo '<div class="read-more-item-card">';
        echo '<div class="read-more-item-image">';
        $image = base64_encode($row['image']);
        echo '<img src="data:image/jpeg;base64,' . $image . '" alt="Item Image">';
        echo '</div>';
        echo '<div class="read-more-item-content">';
        echo '<div class="read-more-item-name">' . $row['item_name'] . '</div>';
        echo '<div class="read-more-item-description">' . $row['description'] . '</div>';
        echo '<div class="read-more-item-price">£' . $row['price'] . '</div>';
        echo '<div class="category">' . $row['category'] . '</div>';
        // You can add more information here if needed
        echo '</div>';
        echo '</div>';
    } else {
        echo 'Item not found.';
    }

    // Free result set
    $result->free();
} else {
    echo 'Item ID not provided.';
}

// Close database connection
$conn->close();
?>

</body>
</html>
