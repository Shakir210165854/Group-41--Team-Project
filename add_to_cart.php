<?php
include('db_connection.php');

// Pup-up message function 
session_start();
function goback()
{ 
    $_SESSION['success'] = 'true';
    header("location:Products.php");
}

if (isset($_POST['add_to_cart'])) {
    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $image_id = mysqli_real_escape_string($conn, $_POST['image_id']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    // Check if the item is already in the shopping cart
    $check_sql = "SELECT * FROM shopping_cart WHERE item_id = $item_id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // echo '<p>Item is already in the shopping cart.</p>';
        goback();
    } else {
        // If the item is not in the shopping cart, insert it with additional details
        $insert_sql = "INSERT INTO shopping_cart (item_id, image_id, item_name, description, price) 
                       VALUES ('$item_id', '$image_id', '$item_name', '$description', '$price')";
        if ($conn->query($insert_sql) === TRUE) {
            header('location:Products.php');
        } else {
            echo '<p>Error adding item to the shopping cart: ' . $conn->error . '</p>';
        }
    }
}

$conn->close();
?>
