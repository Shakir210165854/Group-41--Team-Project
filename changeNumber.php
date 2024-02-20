<?php
session_start();
include_once("db_connection.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage.php");
    exit;
}

$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPhonenumber =  mysqli_real_escape_string($conn, $_POST['newNumber']);
    $query = "SELECT phone_number FROM users WHERE user_id ='$user_id'";
    $update_query = "UPDATE users SET phone_number = '$newPhonenumber' WHERE user_id = '$user_id'";
    $update_result = mysqli_query($conn,$update_query);
    if ($update_result) {
        echo "<script>alert('Updated Phone Number Successfully'); window.location.href = 'myAccount.php';</script>";
    } else {
        echo "Error updating Phone number: " . mysqli_error($conn);
    } }

mysqli_close($conn);
?>
