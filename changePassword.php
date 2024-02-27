<?php
session_start();
include_once("db_connection.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: loginpage.php");
    exit;
}
$user_id = $_SESSION["user_id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $currentPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $currentPassword = md5($currentPassword);
    $query = "SELECT password FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        if ($currentPassword === $hashed_password) {
            $hashed_new_password = md5($newPassword);
            $update_query = "UPDATE users SET password = '$hashed_new_password' WHERE user_id = '$user_id'";
            $update_result = mysqli_query($conn, $update_query);
            if ($update_result) {
                echo "<script>alert('Updated password successfully'); window.location.href = 'myAccount.php';</script>";
            } else {
                echo "Error updating password: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Wrong Password'); window.location.href = 'myAccount.php';</script>";
            exit();
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>
