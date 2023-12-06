<!-- Include the database connection file -->
<?php include ('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    

       <h1 class="title"> My Account Information</h1>
    <div class="padding">
       <input placeholder="Profile Picture ">
            <br>

            <br>
       <p>Name = </p>
       <manageMyAccount>
        <button onclick="window.location.href = 'Manage My Account';">Manage My Account</button>
        <br> </manageMyAccount></br>
        <placeholder>Email Address = </placeholder>
        <br> </br>
        <button>Reset Password</button>
    </div>
    </div>



</body>
</html>