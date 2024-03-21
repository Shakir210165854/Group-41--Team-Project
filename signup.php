<?php include('db_connection.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>signup</title>
    <link rel="stylesheet" type="text/css" href="designForms.css" />
</head>
<body>
    <section class="container signup-container" id="sign-up">
        <h1>Sign Up</h1>
        <form method="post" action="loginpage.php">
            <div class="form-group">
                <label for="first_name">First name:</label>
                <input type="text" id="first_name" name="first_name" required />
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" required />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="signupEmail" name="email" required/ />
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="tel" id="phone_number" name="phone_number" required />
            </div>
            <div class="form-group">
                <label for="street">Street Address:</label>
                <input type="text" id="street" name="street" required />
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required />
            </div>
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" id="state" name="state" required />
            </div>
            <div class="form-group">
                <label for="zip_code">Zip Code:</label>
                <input type="text" id="zip_code" name="zip_code" required />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="signupPassword" name="password" minlength="8" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#\$%\^&\*\(\)_\-+=]).{8,}$" required />
            </div>
            <div class="form-group">
                <label for="confPassword">Re-enter Password:</label>
                <input type="password" id="confPassword" name="confPassword" required />
            </div>

            <button type="submit" name="sign-up">Sign Up</button>

        </form>

        <p>
            Already have an account? <a href="loginpage.php">Login</a>
        </p>

        <p>
            <a href="newHome.php">Continue as Guest</a>
        </p>
    </section>
</body>
</html>
