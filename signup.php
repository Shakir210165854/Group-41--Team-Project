<?php include('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
<section class="container" id='signupForm'>
            <h1>Sign Up</h1>
            <form method="post" action="loginpage.php">

                <label for="first_name">first name:</label>
                <input type="name" id="first_name" name="first_name" required />

                <label for="surname">surname:</label>
                <input type="surname" id="surname" name="surname" required />

                <label for="email">Email:</label>
                <input type="email" id="signupEmail" name="email" required/>

                <label for="Phone_number">Phone_number:</label>
                <input type="number" id="number" name="phone_number" required />

                <label for="password">Password:</label>
                <input type="password" id="signupPassword" name="password" required />

                <label for="confPassword">Re-enter Password:</label>
                <input type="Password" id="confPassword" name="confPassword" required />


                <button type="submit" name="sign-up">Sign Up</button>
            </form>

            <p>
                Already have an account? <a href="loginpage.php">Login</a>
            </p>
</section>
    
</body>
</html>