﻿<?php include('db_connection.php') ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="Design.css" />
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
        <section id='loginForm'>
            <h1>Login Form</h1>
          <!-- <form onsubmit="hashPassword(document.getElementById('password').value); return false;"> -->
            <form method="post" action="loginpage.php">
                <label for="email">Username:</label>
                <input type="text" id="username" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button  type="submit" name="log-in">Login</button>
            </form>
        </section>
    </div>



</body>
</html>