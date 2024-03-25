<?php
session_start();
include('db_connection.php');

// Check if user is logged in and get id from session
if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage.php");
    exit();
}

// Fetch previous orders for the loggedin user
$user_id = $_SESSION['user_id'];
$sql = "SELECT DISTINCT order_details.item_id, items.item_name
        FROM order_details
        INNER JOIN items ON order_details.item_id = items.item_id
        WHERE order_details.user_id = $user_id";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_reviews'])) {
    // Retrieve ratings and comments submitted by the user
    $ratings = $_POST['rating'];
    $comments = $_POST['comment'];

    // Go over each rating and insert into DB
    foreach ($ratings as $key => $rating) {
        $item_id = $_POST['item_id'][$key];
        $comment = mysqli_real_escape_string($conn, $comments[$key]);

        // SQL for inserting into DB
        $sql = "INSERT INTO review (user_id, item_id, rating, comment) VALUES ('$user_id', '$item_id', '$rating', '$comment')";
        if (mysqli_query($conn, $sql)) {

            echo "Thank you for your review";
        } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    header("Location: newHome.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rate and Review</title>
</head>
<body>
    <script>
        function goBack(){
            window.location.href="newHome.php";
            
        }
    </script>

    <div class="mainContent">
        <div class="title">
            <h4>Rate Your Purchased Items</h4>
        </div>

        <div class="rating-review-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table>
                    <tr>
                        <th>Item Name</th>
                        <th>Rating</th>
                        <th>Review</th>
                    </tr>
                    <?php
                    // Display previous orders as a table
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['item_name'] . '</td>';
                        echo '<td>';
                        echo '<select name="rating[]">';
                        for ($i = 1; $i <= 10; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        echo '</select>';
                        echo '</td>';
                        echo '<td><textarea name="comment[]" rows="4" cols="50"></textarea></td>';
                        echo '<input type="hidden" name="item_id[]" value="' . $row['item_id'] . '">';
                        echo '</tr>';
                    }
                    ?>
                </table>
                <button type="submit" name="submit_reviews">Submit Reviews</button>
                <button type="button" onclick="goBack()">Cancel</button>
            </form>
        </div>
    </div>
</body>
</html>
