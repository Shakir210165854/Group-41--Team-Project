<?php
session_start();
include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        
<!-- a login button should disappear when a user is logged-in -->
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
        ?>
        </div>    


        
    <h1 class="title">AlphaTech</h1>

    <div class="slideshow-container">
    <div class="mySlides">
        <img class="hero-image" src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/awr16-aw2723df-aw420k-aw620m-aw720h-xml-pl-gaminggetaway-front.psd?fmt=png-alpha&wid=4000&hei=2249" alt="Hero Image 1">
    </div>
    <div class="mySlides">
        <img class="hero-image" src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/m18-aw3423dw-aw920k-aw720m-aw920h-xml-prestige-pursuer-front-4000x2250.jpg?fmt=jpg&wid=4000&hei=2250" alt="Hero Image 2">
    </div>
    <div class="mySlides">
        <img class="hero-image" src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/x16-aw3423dw-aw420k-aw720m-aw920h-xml-experience-seeker-front-4000x2250.jpg?fmt=jpg&wid=4000&hei=2250" alt="Hero Image 3">
    </div>
    <div class="mySlides">
        <img class="hero-image" src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/awr15-aw3423dw-aw510k-aw620m-aw720h-xml-enthusiast-front.jpg?fmt=jpg&wid=4000&hei=2249" alt="Hero Image 4">
    </div>
    </div>

    <h1 class="subtitle">Looking for parts for your dream setup?</h1>
    <p class="paragraph-one">Click below to get top-of-the-line parts for the setup of your dreams</p>
    <p class="paragraph-two"><a href="Products.php">Click here!</a></p>

    <div class="side-image-container">
    <div class="side-by-side-images">
        <div class="side-image">
            <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/awr14-aw720m-aw920h-lifestylelaptop.jpg?fmt=jpg&wid=1080&hei=720">
            <p class="side-image-text">Want to know who made this all possible?<br><a href="About_Us.php">Click here to find out!</a></br></p>
        </div>
        <div class="side-image">
            <img src="https://i.dell.com/is/image/DellContent/content/dam/ss2/product-images/page/campaign/alienware/gaming/awr14-aw920h-girlsgame.jpg?fmt=jpg&wid=1080&hei=720" alt="Image 2">
            <p class="side-image-text">Need support with anything?<br><a href="Contact_Us.php">Click here to get in contact!</a></br></p>
        </div>
    </div>
</div>

</div>
    
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 4000);
        }
    </script>

</body>

</html>
