<?php include('db_connection.php') ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>

<body>

    
    
        <section id='loginForm'>
            
            <form method="post" action="loginpage.php">
            <h1>Login</h1><br>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required />

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />

                <button type="submit" name="log-in">Login</button>
                <br><br>
                <p>
                Don't have an account? <a href="signup.php">Sign up</a>
            </p>
            </form>

            
        </section>


</body>

</html>
