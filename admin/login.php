<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT ID FROM tbladmin where  AdminuserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['aid']=$ret['ID'];
     echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    }
    else{
     echo "<script>alert('Invalid Details');</script>";
      echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
  }
  ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../css/index.css" />
  </head>
  <body>
      

    <main>
      <div class="form">
   
    
        <h2>فۆڕمی چوونەژوورەوە</h2>
        <form  method="POST">
      <a href="index.php" ><img src="../img/university.png" id="logo" /></a>

          <input
            type="text"
            id="student_id"
            name="username"
            placeholder="ناوی بەکارهێنەر"
            required
          />
          <input
            type="password"
            name="password"
            id="student_serial"
            placeholder=" کۆد"
            required
          />
          <button type="submit" name="login" class="btn">چوونەژوورەوە</button>
        </form>
      </div>
    </main>

    <footer id="footer">
      <p>Copyright - 2023 | Developed By <a href="">Peshawa & Zaid</a></p>
    </footer>
  </body>
</html>
