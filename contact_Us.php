<?php
session_start();
include ('db_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="PageDesign.css"/>
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/tZw1b64/Alpha-Tech-Final-PNG.png"> 
</head>

<body>

    <nav>
        <a class="logo" onclick="return false;"><img src="https://i.ibb.co/n01ZhS9/Alpha-Tech-V3.png" alt="ATlogo"></a>
        <button onclick="window.location.href = 'newHome.php';">Home</button>
<?php
if (isset($_SESSION['user_id'])) {
    // If logged in, go to the My Account page
    echo '<button onclick="window.location.href = \'myAccount.php\';">My Account</button>';
} else {
    // If not logged in, go to the login page
    echo '<button onclick="window.location.href = \'loginpage.php\';">My Account</button>';
}
?>


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
      
        <h1 class="title">Contact Us</h1>

        <!-- <div class="paragraph">
        <p>Connecting with us is simple. Whether you have questions, inquiries, or just want 
        to say hello, feel free to send us a message. Our dedicated team at AlphaTech is here 
        to assist you. feel free to provide more details, and we can help you refine your message 
        or provide additional information. Let AlphaTech help set you apart in your journey. We look forward to hearing from you!</p>
        </div> -->

        <div class="Contact-form">
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
                <p>Thank you for reaching out to AlphaTech! Your message has been received,and we appreciate your interest in AlphaTech.</p>
            </div>
        </form>

        

        </div>

       <!-- <footer class="footer">
        
    </footer>
         -->
    </div>
  
    

    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script>
        document.getElementById('Form2').addEventListener('submit', function (e) {
            e.preventDefault(); 
            
            document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('subject').value = '';
        document.getElementById('message').value = '';

            document.getElementById('thankYouMessage').style.display = 'block';
        });

        
        
    </script>


</body>
</html>


