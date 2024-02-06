<?php include('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" type="text/css" href="designForms.css" />
</head>
<body>
<section class="container" id='signupForm'>
            <h1>Sign Up</h1>
            <form method="post" action="loginpage.php">

                <label for="first_name">First name:</label>
                <input type="text" id="first_name" name="first_name" required />

                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" required />

                <label for="email">Email:</label>
                <input type="email" id="signupEmail" name="email" required/>

                <label for="Phone_number">Phone Number:</label>
                <input type="tel" id="number" name="phone_number" required />

                <label for="password">Password:</label>
                <input type="password" id="signupPassword" name="password" minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*\(\)_\-+=]).{8,}$" required />

                <label for="confPassword">Re-enter Password:</label>
                <input type="password" id="confPassword" name="confPassword" required />

                <button type="submit" name="sign-up">Sign Up</button>
            </form>

            <p>
                Already have an account? <a href="loginpage.php">Login</a>
            </p>

            <p2>
                <a href="newHome.php">Continue as Guest</a>
            </p2>
</section>
    
</body>
</html>