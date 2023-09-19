<?php
session_start();
//error_reporting(0);
error_reporting(E_ALL);
include('includes/dbconnection.php');


if (isset($_GET['login'])) {
    $code = $_GET['code'];
    $password = $_GET['passcode'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM student_data WHERE Code = ? AND Passcode = ?";
    
    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, "ss", $code, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    // Check if the query preparation fails
   
    
    if (mysqli_stmt_num_rows($stmt) == 1) {
        // User authenticated
        $_SESSION['code'] = $code;
        header("Location: dashboard.php"); // Redirect to a dashboard or home page
        exit();
    }else {
        // Invalid credentials
        header("Location: login.php?error=invalid");
        exit();
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
