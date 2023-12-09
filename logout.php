<!-- Log out Function -->
<?php
include ('db_connection.php');
// $user = mysqli_fetch_assoc($results);
$uid = $user['user_id'];
$_SESSION['user_id'] = $uid;

session_start();
// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other desired page after logout
    header("Location: newHome.php");
    exit();
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: loginpage.php");
    exit();
}
?>