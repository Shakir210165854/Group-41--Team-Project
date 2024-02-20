<?php
session_start();
include('db_connection.php');

//check whether a user is logged in
if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];


    //get the first name and email where the ID matches the ID stored in DB
    $query = "SELECT first_name, surname, email, phone_number FROM users WHERE user_id = $userID";
    $result = mysqli_query($conn, $query);



    //check if there is a result
    if ($result) {
        //fetch the array for the user info
        $userInfo = mysqli_fetch_assoc($result);

        //output user info
        $first_name = $userInfo['first_name'];
        $surname = $userInfo ['surname'];
        $email = $userInfo['email'];
        $phone_number = $userInfo['phone_number'];

        //close connection
        mysqli_close($conn);
    } else {
        //if error then close connection and exit
        echo "Error: " . mysqli_error($conn);
        mysqli_close($conn);
        exit();
    }
} else {
    //if user isn't logged in then leave empty
    $first_name = $surname = $email = ''; // Set default values or handle as needed
}
?>
