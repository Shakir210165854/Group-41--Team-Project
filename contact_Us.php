<?php
session_start();
include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Design.css"/>
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

    <div class="mainContent">
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
      
        <h1 class="title">Contact</h1>

        <form id="Form2" action="process_contact_form.php" method="post">
            <h3>GET IN TOUCH</h3>
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Name" required>
            <small class="error"></small>

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Email" required>
            <small class="error"></small>

            <label for="subject">Subject:</label>
            <input type="text" id="subject" placeholder="Subject" required>
            <small class="error"></small>
            
            <label for="message">Message:</label>
            <textarea id="message" placeholder="Message" rows="4" required></textarea>
            <small class="error"></small>

            <button type="submit" class="myButton">Submit</button>

            <div id="thankYouMessage" style="display: none;">
                <p>Thank you for submitting the form!</p>
            </div>
        </form>
    </div>
  
    <footer class="footer">
        <p1>hello</p1>
    </footer>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        document.getElementById('Form2').addEventListener('submit', function (e) {
            e.preventDefault(); 
            document.getElementById('thankYouMessage').style.display = 'block';
        });
    </script>

    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            // ... (unchanged code)
        }
        else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>
</html>
