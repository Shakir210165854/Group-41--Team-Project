<?php include ('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Design.css"/>
    <style>
        .title {
    color: rgb(246, 242, 242);
    font-size: 50px;
    font-weight: bold;
    font-family: 'Arial', sans-serif;
    text-align: center;
    background-color: #5e1698;
        }
    .image-container {
    text-align: center;
    margin-top: 20px;
}
 
.image-container img {
    max-width: 100%;
    border-radius: 10px;
}
 
.products {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}
 
.product {
    text-align: center;
    margin: 20px;
    flex: 1 0 20%;
    max-width: 300px;
}
 
.team-member img {
    max-width: 100%;
}
 
.team-member h2 {
    margin-top: 10px;
    color: #333;
}
 
.team-member p {
    margin-top: 5px;
    color: #555;
}

    </style>
</head>


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
        <login>
                <button onclick="window.location.href = 'loginpage.php';">login</button>
            </login>
    
            <?php
    // Include the database connection file
    
    
    // Perform a SELECT query
    $sql = "SELECT user_id, first_name, email FROM users";
    $result = $conn->query($sql);
    
    // Display the results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["user_id"] . " - Username: " . $row["first_name"] . " - Email: " . $row["email"] . "<br>";
        }
    } else {
        echo "";
    }
    
    // Close the connection
    $conn->close();
    ?>

    <div class='mainContent' style="color: aliceblue;">
    <h1 class="title"> Products</h1>
       
    <div class="padding">
    
    <div class="products">
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Person 1">
            <h2>Product Name 1</h2>
            <p>Product Description</p>
        </div>
 
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Person 2">
            <h2>Product Name 2</h2>
            <p>Product Description</p>
        </div>
 
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Person 3">
            <h2>Product Name 3</h2>
            <p>Product Description</p>
        </div>
 
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Person 4">
            <h2>Product Name 4</h2>
            <p>Product Description</p>
        
            
        </div>
        <div class="padding">
    
    <div class="products">
        <div class="product">
            <img src="https://via.placeholder.com/150" alt="Person 1">
            <h2>Product Name 5</h2>
            <p>Product Description</p>
        </div>
 

        </div>
        </div>
        </div>
        


</body>
</html>