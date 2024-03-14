<!-- Include the user information php file -->
<?php 
include ('getUserInfo.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account</title>
    <link rel="stylesheet" type="text/css" href="PageDesign.css" />
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/tZw1b64/Alpha-Tech-Final-PNG.png"> 
</head>


<body>
    <!--left side nav bar which is present on all pages-->
    <nav>
        <a class="logo" onclick="return false;">
            <img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo" />
        </a>
        <!--when clicking on buttons it goes to the page that was clicked on.-->
        <button onclick="window.location.href = 'newHome.php';">Home</button>
        <button onclick="window.location.href = 'myAccount.php';">My Account</button>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>
    <!--main content is responsible for ensuring the page follows the same layout- login button top right
    then title spanning the width below it and then the page content below that-->
    <div class='mainContent' style="color: aliceblue;">

        <div class="login">
            <!-- <button onclick="window.location.href = 'loginpage.php';">login</button> -->
            <?php
        if (isset($_SESSION['user_id'])) {
            // If logged in, show logout button
            echo '<div class="login">';
            echo '<form action="logout.php" method="post">';
            echo '<button type="submit" name="logout">Logout</button>';
            echo '</form>';
            // echo '<button onclick="window.location.href = \'logout.php\';">Logout</button>';
            echo '</div>';



        } else {
            // If not logged in, show login button
            echo '<div class="login">';
            echo '<button onclick="window.location.href = \'loginpage.php\';">Login</button>';
            echo '</div>';
        }
            ?> <div class="Basket">
            <a onclick="window.location.href = 'shopping_basket.php';"><img src="Basket.png" alt="ATlogo"></a>
            </div>
    
        </div>

        <h1 class="title"> My Account Details</h1>
        <div class="accountInfo">
            <img src="https://via.placeholder.com/150" alt="Person 1" />
            <!--new container to store the labels and values-->
            <div class="infoContainer">
                <label for="name">Name: </label>
                <!--used the php from getUserInfo.php to get the firstname, surname and email.  strtoupper makes it uppercase-->
                <span class="infoContent"><?php echo strtoupper($first_name . " " . $surname); ?></span>

            </div>
            <br />
            <br />
            <div class="infoContainer">
                <label for="email">Email: </label>
                <span class="infoContent"><?php echo $email; ?></span>
                <label for="email">Phone Number: </label>
               
                <span class="infoContent"><?php echo $phone_number; ?></span> 
                <!-- Change number form -->
                <form method="post" action="changeNumber.php">
                    <label for="newNumber"> New Number: </label>
                    <input type="tel" id="newNumber" name="newNumber" required />
                    <button type="submit" name="change-number">Change Phone Number</button>
    </form>
                <!-- Change pass form -->
                <form method="post" action="changePassword.php">
                   </br>
                    <label for="current_Password"> Current Password: </label>
                    <input type="password" id="current_Password" name="currentPassword" required />
                    <label for="new_Password"> New Password: </label>
                    <input type="password" id="new_Password" name="newPassword" required /><br><br>
                    <button type="submit" name="change-pass">Change Password</button>
    </form>
            </div>

        </div>
    </div>
</body>
</html>