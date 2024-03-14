<?php include('db_connection.php') ?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="designForms.css" />
    <link rel="icon" type="image/x-icon" href="https://i.ibb.co/tZw1b64/Alpha-Tech-Final-PNG.png"> 
</head>

<body>

    
    
        <section class="container" id='loginForm'>
            
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
            <a href="newHome.php">Continue as guest</a>
            </form>

            
        </section>


</body>

</html>
