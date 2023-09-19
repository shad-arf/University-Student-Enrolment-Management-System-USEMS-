<?php
session_start();
error_reporting(E_ALL);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
    $code = $_POST['code'];
    $password = $_POST['passcode'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM student_data WHERE Code = ? AND Passcode = ?";
    
    $stmt = mysqli_prepare($con, $query);

    if ($stmt === false) {
        die("Preparation failed: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "is", $code, $password);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // User authenticated
            $_SESSION['uid'] = $code;
            echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>"; // Redirect to a dashboard or home page
            exit();
        } else {
            // Invalid credentials
            header("Location: login.php?error=invalid");
            exit();
        }
    } else {
        die("Execution failed: " . mysqli_error($con));
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
