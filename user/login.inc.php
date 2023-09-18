<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


if (isset($_POST['login'])) {
    $code = $_POST['code'];
    $password = $_POST['passcode'];

    // Use prepared statements to prevent SQL injection
    $query = "SELECT * FROM student_data WHERE code = ?";
    $stmt = mysqli_stmt_init($con);
   
    // Check if the query preparation fails
  
    if (!mysqli_stmt_prepare($stmt, $query)) {
        // Redirect the user to the login page with an error message
        header("Location: login.php?error=sqlerror");
        exit();
    } else {

        // Bind the parameters to the query
        mysqli_stmt_bind_param($stmt, "s", $code);
        // Execute the query
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $result = mysqli_stmt_get_result($stmt);
        // Check if the user is found in the database
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            // Check if the provided password matches the stored password
            if ($password == $row['Passcode']) {
                // Start the session and set the user information
                $_SESSION['uid'] = $row['id'];
                $_SESSION['code'] = $row['Code'];
                $_SESSION['name'] = $row['Name'];
                
                // Redirect the user to the dashboard with a success message
                header("Location: dashboard.php?login=success");
                exit();
            } else {
                // Redirect the user to the login page with an error message
                header("Location: login.php?error=wrongpassword");
                exit();
            }
        } else {
            // Redirect the user to the login page with an error message
            header("Location: login.php?error=nouserfound");
            exit();
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
