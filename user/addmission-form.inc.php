<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/dbcon.php');

// require_once "includes/dbcon.php";
$appdata='';
if (strlen($_SESSION['uid'] == 0)) {
  header('location:logout.php');
} else {

  // Coding for form Submission 
  //adding first form
	
if (isset($_POST['submit1'])) {
    $userId = $_SESSION['uid'];
    $gender = $_POST['gender'];
    $facultyId = (int)$_POST['facultyId'];

    $departmentId = (int)$_POST['departmentId'];
    $idCode =(int)$_POST['idCode'];
    $kuLastName = $_POST['kuLastName'];
    $kuSecondName = $_POST['kuSecondName'];
    $kuFirstName = $_POST['kuFirstName'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $upic = $_FILES["image"]["name"];


    $extension = substr($upic, strlen($upic) - 4, strlen($upic));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif","PNG","JPG","JPEG");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
      // rename user pic
      $userpic = md5($upic) . $extension;
      move_uploaded_file($_FILES["image"]["tmp_name"], "userimages/" . $userpic);
      var_dump($secondName);
      $query = mysqli_query($con, "INSERT INTO `tbladmapplications`(`userId`, `gender`, `image`, `firstName`, `lastName`, `kuFirstName`, `kuLastName`, `idCode`, `facultyId`, `departmentId`, `kuSecondName`, `secondName`, `adminNote`) VALUES ('$userId','$gender','$userpic','$firstName','$lastName','$kuFirstName','$kuLastName','$idCode','$facultyId','$departmentId','$kuSecondName','$secondName',' ')");

      if ($query) {

        echo '<script>alert("Data has been added successfully.")</script>';
        echo "<script>window.location.href ='addmission-form.php'</script>";
      } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        echo "<script>window.location.href ='addmission-form.php'</script>";
      }
    }
  }
//adding first form



  



if (isset($_POST['submit2'])) {
    $userId = $_SESSION['uid'];
    $gender = $_POST['gender'];
    $facultyId = $_POST['facultyId'];
    $departmentId = $_POST['departmrntId'];

    $idCode = $_POST['idCode'];
    $kuLastName = $_POST['kuLastName'];
    $kuSecondName = $_POST['kuSecondName'];
    $kuFirstName = $_POST['kuFirstName'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    
    $appId = (int)$_POST['appId'];
    $upic = $_FILES["image"]["name"];
    $extension = substr($upic, strlen($upic) - 4, strlen($upic));
    // allowed extensions
    $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
    // Validation for allowed extensions .in_array() function searches an array for a specific value.
    if (!in_array($extension, $allowed_extensions)) {
      echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    } else {
      // rename user pic
      $userpic = md5($upic) . $extension;
      move_uploaded_file($_FILES["image"]["tmp_name"], "userimages/" . $userpic);
      $query=mysqli_query($con, "UPDATE `tbladmapplications` SET `gender`='$gender',`image`='$userpic',`firstName`='$firstName',`lastName`='$lastName',`kuFirstName`='$kuFirstName',`kuLastName`='$kuLastName',`idCode`='$idCode',`facultyId`='$facultyId',`departmentId`='$departmentId',`kuSecondName`='$kuSecondName',`secondName`='$secondName',`status`='pending' WHERE id='$appId'");
      if ($query) {
        echo "<script>alert('First Form Updated.');</script>";
        echo "<script>window.location.href ='addmission-form.php'</script>";
        
        }else{
           echo "<script>alert('Something Went Wrong. Please try again.');</script>";
           echo "<script>window.location.href ='addmission-form.php'</script>";
            }
        
      // $query=mysqli_query($con, "update tbladmapplications set status='pending',firstName=".$firstName.",secondName=".$secondName.",lastName=".$lastName.",kuFirstName=".$kuFirstName.",kuSecondName=".$kuSecondName.",kuLastName=".$kuLastName.",image=".$userpic.",idCode=".$idCode.",gender=".$gender.",facultyId=".$facultyId." WHERE id='$appId'");

    }
    }
}

  //second submit for first form 