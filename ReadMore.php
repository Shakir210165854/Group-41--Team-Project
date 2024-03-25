<?php include('db_connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReadMore</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
    <style>
.read-more-item-card {
        display: flex;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        padding: 10px;
    }
    .read-more-item-image {
        flex: 0 0 30%; /* Set the width of the image column */
        margin-right: 10px;
    }
    .read-more-item-image img {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
    }
    .read-more-item-content {
        flex: 1; /* Allow content to take remaining width */
    }
    .read-more-item-name {
        font-weight: bold;
        margin-bottom: 5px;
        color:white;
    }
    .read-more-item-description {
        margin-bottom: 5px;
        color:white;
    }
    .read-more-item-price {
        font-weight: bold;
        color:white;
        margin-bottom: 5px;
    }
    .category {
        font-style: italic;
        margin-bottom: 5px;
        color:white;
    }

    </style>
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

    $ratingQuery = "SELECT * FROM review WHERE item_id = $item_id";
    $ratingResult = $conn->query($ratingQuery);



    // Check if there is a result
    if ($result && $result->num_rows > 0) {
        if ($ratingResult && $ratingResult->num_rows > 0){
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
            // Display rating if exists
            $reviewRow = $ratingResult->fetch_assoc();
            echo '<div class="read-more-ratingStars">';

            echo '<div class="read-more-rating-rate">' . $reviewRow['rating'] . '</div>';
            echo '<div class="read-more-rating-comment">' . $reviewRow['comment'] . '</div>';

            echo '<button onclick="window.location.href = \'Products.php\';">Back</button>';
            echo '</div>';
            echo '</div>';
        }

        else{
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

            echo 'NO REVIEWS';



            echo '<button onclick="window.location.href = \'Products.php\';">Back</button>';
            echo '</div>';
            echo '</div>';
        }
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
