
<?php



$servername = 'localhost';
$username = 'u-210165854';
$password = '2NYFxrXWD8LJWil';
$dbname = 'u_210165854_db';
$errors = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
  $userID = $_SESSION['user_id'];
} else {
  // If the user is not logged in, treat them as a guest
  $userID = null;
}

//php for checking log in details
if (isset($_POST['log-in'])) {
    $username = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM users WHERE email='$username' AND password='$password' ";
      $results = mysqli_query($conn, $query);

      if (mysqli_num_rows($results) == 1) {
        $user = mysqli_fetch_assoc($results);
        $uid = $user['user_id'];
        $_SESSION['email'] = $username;
        $_SESSION['user_id'] = $uid;
        $_SESSION['success'] = "You are now logged in";
        $userID = $uid; // Update $userID
        header('location: newHome.php');

        if($user['admin'] == 1){
          header('location: AdminHomePage.php');
        }else{
          header('location: newHome.php');
        }

        
        // Log activity to the database, give date and time as well as action.
        $timestamp = date('Y-m-d H:i:s');
        $action="log in";
        $insert_query = "INSERT INTO user_logs (user_id, timestamp, action) VALUES ('$userID', '$timestamp' , '$action')";
        mysqli_query($conn, $insert_query);

     
      }else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }

?>
<!-- Sign-up connection -->
<?php
if (isset($_POST['sign-up'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($conn, $_POST['first_name']);
  $surname = mysqli_real_escape_string($conn, $_POST['surname']);
  $username = mysqli_real_escape_string($conn, $_POST['email']);
  $phonenumber = mysqli_real_escape_string($conn, $_POST['phone_number']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $Confirm_password = mysqli_real_escape_string($conn, $_POST['confPassword']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, " Please input your name"); }
  if (empty($surname)) { array_push($errors, " Please input your surname"); }
  if (empty($phonenumber)) { array_push($errors, " Please input a Phone number"); }
  if (empty($username)) { array_push($errors, " Please input an Email"); }
  if (empty($password)) { array_push($errors, "Please input a Password"); }
  if ($password != $Confirm_password) {
	array_push($errors, "The confirmation passwords do not match your password");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$username' OR phone_number='$phonenumber' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $username) {
      array_push($errors, "email already exists");
    }

    if ($user['phone_number'] === $phonenumber) {
      array_push($errors, "Phone number exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
      $password = md5($password); //encrypt the password before saving in the database

      $query = "INSERT INTO users (email, password, first_name, surname, phone_number)
              VALUES('$username', '$password', '$firstname', '$surname', '$phonenumber')";
      mysqli_query($conn, $query);

      // Get the last inserted user ID
      $userID = mysqli_insert_id($conn);


      // Insert address details into the address table
      $street = mysqli_real_escape_string($conn, $_POST['street']);
      $city = mysqli_real_escape_string($conn, $_POST['city']);
      $state = mysqli_real_escape_string($conn, $_POST['state']);
      $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);


      $query2 = "INSERT INTO address (user_id, street_address, city, state, postal_code)
                      VALUES ('$userID', '$street', '$city', '$state', '$zip_code')";
      mysqli_query($conn, $query2);



      $_SESSION['email'] = $username;
      $_SESSION['user_id'] = $userID; // Update $_SESSION['user_id']
      $_SESSION['success'] = "You have successfully registered.";

      // Log activity to the database, give date and time as well as action.
      $timestamp = date('Y-m-d H:i:s');
      $action = "registered";
      $insert_query = "INSERT INTO user_logs (user_id, timestamp, action) VALUES ('$userID', '$timestamp', '$action')";
      mysqli_query($conn, $insert_query);

      header('location: loginpage.php');
  }

}
?>

<!-- check for errors -->
<?php  
if (count($errors) > 0) : ?>
  <script>
    // Displaying each error message in a separate alert
    <?php foreach ($errors as $error) : ?>
      alert("<?php echo $error; ?>");
    <?php endforeach ?>
  </script>
<?php  endif ?>
