<?php include ('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css"/>
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
        <div class="login">
                <button onclick="window.location.href = 'loginpage.php';">login</button>
</div>


    <h1 class="title"> Products</h1>

    <div class="item">
        <img src="https://media.istockphoto.com/id/1371213291/photo/3d-rendering-of-cyberpunk-ai-circuit-board-technology-background-central-computer-processors.jpg?s=612x612&w=0&k=20&c=saeDrSwqdVnj0gjftZhmfZn1a6kFgdv2NEUrV1uqI1Y=" alt="Item Image">
        <div class="item-name">Item Name</div>
        <div class="item-description">this is a small description of the item</div>
        <div class="item-price">£19.99</div>
    </div>

    </div>
        


</body>
</html>