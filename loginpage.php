<?php include('db_connection.php') ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="designForms.css" />
    <style>
        #signupForm{
            display:none;
        }
    </style>
</head>

<body>

    <div class='mainContent' style="color: aliceblue;">
        <section id='loginForm'>
            <h1>Login</h1>
            <form method="post" action="loginpage.php">
                <label for="email">Username:</label>
                <input type="text" id="username" name="email" required />

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required />

                <button type="submit" name="log-in">Login</button>
            </form>

            <p>
                Don't have an account? <a href="#" id="showSignup">Sign up</a>
            </p>
        </section>

        <section id='signupForm'>
            <h1>Sign Up</h1>
            <form method="post" action="loginpage.php">
                <label for="email">Email:</label>
                <input type="email" id="signupEmail" name="email" required/>

                <label for="password">Password:</label>
                <input type="password" id="signupPassword" name="password" required />

                <label for="confPassword">Re-enter Password:</label>
                <input type="Password" id="confPassword" name="confPassword" required />


                <button type="submit" name="sign-up">Sign Up</button>
            </form>

            <p>
                Already have an account? <a href="#" id="showLogin">Login</a>
            </p>
        </section>
    </div>

    <script>
            document.getElementById('showSignup').addEventListener('click', function () {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('signupForm').style.display = 'block';
        });

        document.getElementById('showLogin').addEventListener('click', function () {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('signupForm').style.display = 'none';
        });
    </script>

</body>

</html>
