<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>AlphaTech</title>
    <link rel="stylesheet" type="text/css" href="Design.css"/>
</head>
<body>

    <nav>

        <a class="logo" onclick="return false;"><img src="https://i.ibb.co/ZBsn56k/ATlogo.jpg" alt="ATlogo"></a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>


    <div class='mainContent' style="color: aliceblue;">
        <h2> Home Page</h2>
        

        <login>
            <button>login</button>
        </login>

        <?php
// Include the database connection file
include ('db_connection.php');

// Perform a SELECT query
$sql = "SELECT user_id, first_name, email FROM users";
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["user_id"] . " - Username: " . $row["first_name"] . " - Email: " . $row["email"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
       
    </div>
    
    <footer class="footer">
       <p1>hello</p1>
    </footer>
    
</body>

</html>
