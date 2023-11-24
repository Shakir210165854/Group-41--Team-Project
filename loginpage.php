<?php include('db_connection.php') ?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="designForms.css" />
</head>
<body>

    <div class='mainContent' style="color: aliceblue;">
        <section id='loginForm'>
            <h1>Login</h1>
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