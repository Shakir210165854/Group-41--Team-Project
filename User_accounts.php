<?php include 'db_connection.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png">
    <!-- <link rel="stylesheet" type="text/css" href="stylesheet.css"/> -->
    <style>
        <?php include 'stylesheet.css'; ?>
    </style>
</head>

<body>
    <div class="cards-container">
        <?php


        // Check connection
        if ($conn->connect_error) {
            die ("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch user information including address
        $sql = "SELECT u.first_name, u.surname, u.email, u.phone_number, a.street_address, a.city, a.state, a.postal_code
                    FROM users u
                    JOIN address a ON u.user_id = a.user_id
                    WHERE u.admin = 0";
        $result = $conn->query($sql);

        // Display user information on cards
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<h2>" . $row['first_name'] . " " . $row['surname'] . "</h2>";
                echo "<p>Email: " . $row['email'] . "</p>";
                echo "<p>Phone: " . $row['phone_number'] . "</p>";
                echo "<p>Address: " . $row['street_address'] . ", " . $row['city'] . ", " . $row['state'] . ", " . $row['postal_code'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

<a href="AdminHomePage.php">
  <button class="user_home_button">Back to Home</button>
</a>

    </div>
</body>

</html>