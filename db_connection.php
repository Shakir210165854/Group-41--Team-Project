<!-- check for errors -->



<!-- db_connection.php -->
<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'alphatech';
$errors = array();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
      $query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
      $results = mysqli_query($conn, $query);
      if (mysqli_num_rows($results) == 1) {
        $user = mysqli_fetch_assoc($results);
        $uid = $user['users_id'];
        $_SESSION['email'] = $username;
        $_SESSION['users_id'] = $uid;
        $_SESSION['success'] = "You are now logged in";
        header('location: newHome.php');
      }else {
        array_push($errors, "Wrong username/password combination");
      }
    }
  }

?>
<?php  
if (count($errors) > 0) : ?>
  <script>
    // Displaying each error message in a separate alert
    <?php foreach ($errors as $error) : ?>
      alert("<?php echo $error; ?>");
    <?php endforeach ?>
  </script>
<?php  endif ?>


