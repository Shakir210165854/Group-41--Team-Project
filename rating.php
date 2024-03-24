<?php
session_start();
include('db_connection.php');
// Check if user is logged in and get user_id from session
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header("Location: loginpage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_reviews'])) {
    $item_ids = $_POST['item_id'];
    $ratings = $_POST['rating'];
    $comments = $_POST['comment'];
    foreach ($item_ids as $key => $item_id) {
        $rating = mysqli_real_escape_string($conn, $ratings[$key]);
        $comment = mysqli_real_escape_string($conn, $comments[$key]);
        
        // Insert the rating and comment into the database
        $insert_query = "INSERT INTO review (user_id, item_id, rating, comment) 
                        VALUES ('$user_id', '$item_id', '$rating', '$comment')";
        mysqli_query($conn, $insert_query);
    }

    header("Location: Products.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate and Review</title>
        <style>
                    * {
            box-sizing: border-box;
        }

        body {
            background-color: lightgray;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background-color: whitesmoke;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px grey;
            max-width: 400px;
            width: 90%;
            margin: auto;
        }

        h1 {
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #5e1698;
            border: none;
            color: white;
            padding: 10px 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #420c6d;
        }

        .rating-container {
            display: flex;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }

    </style>
</head>
<body>
 
    <div class="mainContent">
 
        <div class="title">       
            <h4>Rate and Review Your Purchased Items</h4>
        </div>

        <div class="rating-review-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <?php
                // Fetch items from the shopping_cart table for the logged-in user
                $sql = "SELECT shopping_cart.*, items.item_name, items.item_id FROM shopping_cart
                        INNER JOIN items ON shopping_cart.item_id = items.item_id
                        WHERE shopping_cart.user_id = '$user_id'";
                $result = $conn->query($sql);

                // Display rating and review form for each item
                while ($row = $result->fetch_assoc()) {
                    echo '<input type="hidden" name="item_id[]" value="' . $row['item_id'] . '">';
                    echo '<label for="rating">Rating for ' . $row['item_name'] . ': </label>';
                    echo '<select name="rating[]">';
                    echo '<option value="1">1</option>';
                    echo '<option value="2">2</option>';
                    echo '<option value="3">3</option>';
                    echo '<option value="4">4</option>';
                    echo '<option value="5">5</option>';
                    echo '</select><br>';
                    echo '<label for="comment">Review for ' . $row['item_name'] . ': </label>';
                    echo '<textarea name="comment[]" rows="4" cols="50"></textarea><br>';
                }
                ?>
                <button type="submit" name="submit_reviews">Submit Reviews</button>
            </form>
        </div>
    </div>
</body>
</html>
