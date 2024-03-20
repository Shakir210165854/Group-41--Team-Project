<?php
include('db_connection.php');

session_start();

function goback() { 
    $_SESSION['success'] = 'true';
    header("location:Products.php");
}

if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];
    } else {
        // Guest user id just for now
        $userID = 1; 
    }

    $item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']); // Add this line to retrieve quantity

    // Check if the item is already in the shopping cart
    $check_sql = "SELECT * FROM shopping_cart WHERE user_id = $userID AND item_id = '$item_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        goback();
    } else {
        // If the item is not in the shopping cart, insert it with additional details
        $insert_sql = "INSERT INTO shopping_cart (item_id, user_id, item_name, description, price, quantity) 
                       VALUES ('$item_id', '$userID' , '$item_name', '$description', '$price', '$quantity')";
        if ($conn->query($insert_sql) === TRUE) {
            header('location:Products.php');
        } else {
            echo '<p>Error adding item to the shopping cart: ' . $conn->error . '</p>';
        }
    }
}

$conn->close();

?>
