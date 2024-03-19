<?php
session_start();
include ('db_connection.php');
// Set current page variable
$currentPage = 'about'; // Change this according to the current page


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="PageDesign.css"/>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png"> 
</head>

<body>

    <nav>
    <a class="logo" onclick="return false;"><img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo"></a>
    <button onclick="window.location.href = 'newHome.php';">Home</button>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo ' <button onclick="window.location.href = \'myAccount.php\';">My Account</button>';
       } else {
        echo '<button onclick="window.location.href = \'loginpage.php\';">My Account</button>';
       }
       ?>
        <button onclick="window.location.href = 'Products.php';">Products</button>
        <button class="<?php echo ($currentPage === 'about') ? 'active' : ''; ?>" onclick="window.location.href = 'About_Us.php';">About Us</button>
        <button onclick="window.location.href = 'contact_Us.php';">Contact Us</button>
    </nav>

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
        <h1 class="title">Our Story</h1>

        <p class="about-us-paragraph-one">Our journey began with a simple idea—to provide computer enthusiasts and professionals with high-quality, cutting-edge components that elevate their computing experience.</p>

        <p class="about-us-paragraph-two">Founded by a team of dedicated tech enthusiasts, we set out to create a platform that not only offers a vast selection of computer parts but also ensures that each product meets our rigorous standards for performance and reliability. Our commitment to excellence drives every aspect of our business, from the carefully curated products in our inventory to the seamless shopping experience we provide. At AlphaTech, we understand that each computer build is a unique expression of creativity and functionality. Whether you're a seasoned gamer pushing the limits of performance or a professional seeking the latest innovations for your workstations, we've got you covered.</p>
        <br> </br>
        <h1 class="about-us-subtitle">Our Founders</h1>
        
        <div class="team-members">
            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 1">
                <h2>Ahmed Abdiqadir</h2>
                <p>Founder</p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 2">
                <h2>Amgad Salim</h2>
                <p>Founder</p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 3">
                <h2>Jack Brookes</h2>
                <p>Founder</p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 4">
                <h2>Maxwell Ansah</h2>
                <p>Founder</p>
            </div>


            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 5">
                <h2>Mehran Raja</h2>
                <p>Founder</p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 6">
                <h2>Mohammed Khan</h2>
                <p>Founder</p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 7">
                <h2>Shakir Mahmood</h2>
                <p>Founder</p>
            </div>

            <div class="team-member">
                <img src="https://via.placeholder.com/150" alt="Person 8">
                <h2>Vrutik Gohel</h2>
                <p>Founder</p>
            </div>
        </div>

    </div>
    
</body>
</html>