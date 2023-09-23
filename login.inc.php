<?php
session_start();
error_reporting(0);

include('user/includes/dbconnection.php');

if (isset($_POST['login'])) {
    $code = $_POST['code'];
    $password = $_POST['passcode'];
    if($code=='123123123' && $password=='098098098'){
        header("Location: 'admin/login.php'");

    }
//     $recaptcha_secret = '6LdtVkkoAAAAAKuBsyePlxYop4kH1ADKNniZ9GOk'; // Replace with your actual secret key
// $recaptcha_response = $_POST['g-recaptcha-response'];

// // Create a POST request to the Google reCAPTCHA API
// $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
// $recaptcha_data = [
//     'secret' => $recaptcha_secret,
//     'response' => $recaptcha_response
// ];
    
// $recaptcha_options = [
//     'http' => [
//         'header' => "Content-type: application/x-www-form-urlencoded\r\n",
//         'method' => 'POST',
//         'content' => http_build_query($recaptcha_data)
//     ]
// ];
//     $recaptcha_context = stream_context_create($recaptcha_options);
//     $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
//     $recaptcha_result = json_decode($recaptcha_result);

//     if (!$recaptcha_result->success) {
//         // reCAPTCHA verification failed, handle the error (e.g., show an error message)
//         header("Location: index.php?error=captcha");
//         exit();
//     }
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
            echo "<script type='text/javascript'> document.location ='user/dashboard.php'; </script>"; // Redirect to a dashboard or home page
            exit();
        } else {
            // Invalid credentials
            header("Location: index.php?error=invalid");
            exit();
        }
    } else {
        die("Execution failed: " . mysqli_error($con));
    }
    
}
?>
