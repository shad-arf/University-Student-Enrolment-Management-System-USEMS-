<?php
session_start();
error_reporting(E_ALL);

include('includes/dbconnection.php');
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
  } else{

  //second form
  if (isset($_POST['submitSecond'])) {
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $motherName = $_POST['motherName'];
    $placeOfBreath = $_POST['placeOfBreath'];
    $placeHeSheLive = $_POST['placeHeSheLive'];
    $country = $_POST['country'];
    $governate = $_POST['governate'];
    $city = $_POST['city'];
    $village = $_POST['village'];
    $state = $_POST['state'];
    $idCardNumber = $_POST['idCardNumber'];
    $nationaltyNumber = $_POST['nationaltyNumber'];
    $phoneNumberFirstPerson = $_POST['phoneNumberFirstPerson'];
    $studentPlace = $_POST['studentPlace'];
    $religion = $_POST['religion'];

     $idCardFile = $_FILES["idCardFile"]["name"];
     $nationaltyCardFile = $_FILES["nationaltyCardFile"]["name"];
     $certificate12File = $_FILES["certificate12File"]["name"];
     $bloodTestFile = $_FILES["bloodTestFile"]["name"];
     $eyeTestFile = $_FILES["eyeTestFile"]["name"];
      $payment = $_FILES["payment"]["name"];

     $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

      //checkfor idcardfile extensions
      $idCardFileExtension = substr($idCardFile, strlen($idCardFile) - 4, strlen($idCardFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($idCardFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for idCardFile');</script>";
      } else {
        

      }


      //checkfor idcardfile extensions
      $idCardFileExtension = substr($idCardFile, strlen($idCardFile) - 4, strlen($idCardFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($idCardFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for idCardFile');</script>";
      } else {

      //checkfor nationaltyCardFile extensions
      $nationaltyCardFileExtension = substr($nationaltyCardFile, strlen($nationaltyCardFile) - 4, strlen($nationaltyCardFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($nationaltyCardFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for nationaltyCardFile');</script>";
      } else {

      //checkfor certificate12File extensions
      $certificate12FileExtension = substr($certificate12File, strlen($certificate12File) - 4, strlen($certificate12File));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($certificate12FileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for certificate12File');</script>";
      } else {
        
      //checkfor bloodTestFile extensions
      $bloodTestFileExtension = substr($bloodTestFile, strlen($bloodTestFile) - 4, strlen($bloodTestFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($bloodTestFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for bloodTestFile');</script>";
      } else {
      //checkfor eyeTestFile extensions
      $eyeTestFileExtension = substr($eyeTestFile, strlen($eyeTestFile) - 4, strlen($eyeTestFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($eyeTestFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for eyeTestFile');</script>";
      } else 
       //checkfor payment extensions
      $paymentExtension = substr($payment, strlen($payment) - 4, strlen($payment));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($paymentExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for payment');</script>";
      } else {
        //in here you can insert data and upload files
        $idCardFileUpload = md5($idCardFile) . $idCardFileExtension;
        move_uploaded_file($_FILES["idCardFile"]["tmp_name"], "userdocs/" . $idCardFileUpload);
        $nationaltyCardFileUpload = md5($nationaltyCardFile) . $nationaltyCardFileExtension;
        move_uploaded_file($_FILES["nationaltyCardFile"]["tmp_name"], "userdocs/" . $nationaltyCardFileUpload);
        $certificate12FileUpload = md5($certificate12File) . $certificate12FileExtension;
        move_uploaded_file($_FILES["certificate12File"]["tmp_name"], "userdocs/" . $certificate12FileUpload);
        $bloodTestFileUpload = md5($bloodTestFile) . $bloodTestFileExtension;
        move_uploaded_file($_FILES["bloodTestFile"]["tmp_name"], "userdocs/" . $bloodTestFileUpload);
        $eyeTestFileUpload = md5($eyeTestFile) . $eyeTestFileExtension;
        move_uploaded_file($_FILES["eyeTestFile"]["tmp_name"], "userdocs/" . $eyeTestFileUpload);
        $paymentUpload = md5($payment) . $paymentExtension;
        move_uploaded_file($_FILES["payment"]["tmp_name"], "userdocs/" . $paymentUpload);
      $userId = $_SESSION['uid'];
      $query = mysqli_query($con, "INSERT INTO `tblsecondadmapplications`(`userId`,`dob`, `nationality`, `motherName`, `placeOfBreath`, `placeHeSheLive`, `country`, `governate`, `city`, `village`, `state`, `idCardNumber`, `nationaltyNumber`, `phoneNumberFirstPerson`, `studentPlace`, `religion`, `idCardFile`, `nationaltyCardFile`, `certificate12File`, `bloodTestFile`, `eyeTestFile`,`payment`, `adminNote`) 
                                                                  VALUES ('$userId','$dob','$nationality','$motherName','$placeOfBreath','$placeHeSheLive','$country','$governate','$city','$village','$state','$idCardNumber','$nationaltyNumber','$phoneNumberFirstPerson','$studentPlace','$religion','$idCardFileUpload','$nationaltyCardFileUpload','$certificate12FileUpload','$bloodTestFileUpload','$eyeTestFileUpload','$paymentUpload',' ')");
    
        if ($query) {

          echo '<script>alert("Data has been added successfully.")</script>';
          echo "<script>window.location.href ='upload-doc.php'</script>";
        } else {
          echo '<script>alert("Something Went Wrong. Please try again.")</script>';
          echo "<script>window.location.href ='upload-doc.php'</script>";
        }
        // Close the database connection
        mysqli_close($con);


      }

      }


      }

      }

      }

    
  }
  //second form

  //second form when rejected
  if (isset($_POST['submitsecondreject'])) {
    $userId = $_SESSION['uid'];
    $dob = $_POST['dob'];
    $nationality = $_POST['nationality'];
    $motherName = $_POST['motherName'];
    $placeOfBreath = $_POST['placeOfBreath'];
    $placeHeSheLive = $_POST['placeHeSheLive'];
    $country = $_POST['country'];
    $governate = $_POST['governate'];
    $city = $_POST['city'];
    $village = $_POST['village'];
    $state = $_POST['state'];
    $idCardNumber = $_POST['idCardNumber'];
    $nationaltyNumber = $_POST['nationaltyNumber'];
    $phoneNumberFirstPerson = $_POST['phoneNumberFirstPerson'];
    $studentPlace = $_POST['studentPlace'];
    $religion = $_POST['religion'];

     $idCardFile = $_FILES["idCardFile"]["name"];
     $nationaltyCardFile = $_FILES["nationaltyCardFile"]["name"];
     $certificate12File = $_FILES["certificate12File"]["name"];
     $bloodTestFile = $_FILES["bloodTestFile"]["name"];
     $eyeTestFile = $_FILES["eyeTestFile"]["name"];
    $payment = $_FILES["payment"]["name"];
     $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

      //checkfor idcardfile extensions
      $idCardFileExtension = substr($idCardFile, strlen($idCardFile) - 4, strlen($idCardFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($idCardFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for idCardFile');</script>";
      } else {
        

      }


      //checkfor idcardfile extensions
      $idCardFileExtension = substr($idCardFile, strlen($idCardFile) - 4, strlen($idCardFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($idCardFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for idCardFile');</script>";
      } else {

      //checkfor nationaltyCardFile extensions
      $nationaltyCardFileExtension = substr($nationaltyCardFile, strlen($nationaltyCardFile) - 4, strlen($nationaltyCardFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($nationaltyCardFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for nationaltyCardFile');</script>";
      } else {

      //checkfor certificate12File extensions
      $certificate12FileExtension = substr($certificate12File, strlen($certificate12File) - 4, strlen($certificate12File));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($certificate12FileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for certificate12File');</script>";
      } else {
        
      //checkfor bloodTestFile extensions
      $bloodTestFileExtension = substr($bloodTestFile, strlen($bloodTestFile) - 4, strlen($bloodTestFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($bloodTestFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for bloodTestFile');</script>";
      } else {
      //checkfor eyeTestFile extensions
      $eyeTestFileExtension = substr($eyeTestFile, strlen($eyeTestFile) - 4, strlen($eyeTestFile));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($eyeTestFileExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for eyeTestFile');</script>";
      } else {
            //checkfor payment extensions
      $paymentExtension = substr($payment, strlen($payment) - 4, strlen($payment));
      // allowed extensions
      // Validation for allowed extensions .in_array() function searches an array for a specific value.
      if (!in_array($paymentExtension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed for payment');</script>";
      } else
        //in here you can insert data and upload files
        $idCardFileUpload = md5($idCardFile) . $idCardFileExtension;
        move_uploaded_file($_FILES["idCardFile"]["tmp_name"], "userdocs/" . $idCardFileUpload);
        $nationaltyCardFileUpload = md5($nationaltyCardFile) . $nationaltyCardFileExtension;
        move_uploaded_file($_FILES["nationaltyCardFile"]["tmp_name"], "userdocs/" . $nationaltyCardFileUpload);
        $certificate12FileUpload = md5($certificate12File) . $certificate12FileExtension;
        move_uploaded_file($_FILES["certificate12File"]["tmp_name"], "userdocs/" . $certificate12FileUpload);
        $bloodTestFileUpload = md5($bloodTestFile) . $bloodTestFileExtension;
        move_uploaded_file($_FILES["bloodTestFile"]["tmp_name"], "userdocs/" . $bloodTestFileUpload);
        $eyeTestFileUpload = md5($eyeTestFile) . $eyeTestFileExtension;
        move_uploaded_file($_FILES["eyeTestFile"]["tmp_name"], "userdocs/" . $eyeTestFileUpload);
           $paymentUpload = md5($payment) . $paymentExtension;
        move_uploaded_file($_FILES["payment"]["tmp_name"], "userdocs/" . $paymentUpload);

        $query = mysqli_query($con, "UPDATE `tblsecondadmapplications` SET `dob`='$dob',`nationality`='$nationality',`motherName`='$motherName',`placeOfBreath`='$placeOfBreath',`placeHeSheLive`='$placeHeSheLive',`country`='$country',`governate`='$governate',`city`='$city',`village`='$village',`state`='$state',`idCardNumber`='$idCardNumber',`nationaltyNumber`='$nationaltyNumber',`phoneNumberFirstPerson`='$phoneNumberFirstPerson',`studentPlace`='$studentPlace',`religion`='$religion',`idCardFile`='$idCardFileUpload',`nationaltyCardFile`='$nationaltyCardFileUpload',`certificate12File`='$certificate12FileUpload',`bloodTestFile`='$bloodTestFileUpload',`eyeTestFile`='$eyeTestFileUpload',`payment`='$oaymentUpload',`status`='pending' WHERE userId='$userId'");

        if ($query) {

          echo '<script>alert("Data has been added successfully.")</script>';
          echo "<script>window.location.href ='upload-doc.php'</script>";
        } else {
          echo '<script>alert("Something Went Wrong. Please try again.")</script>';
          echo "<script>window.location.href ='upload-doc.php'</script>";
        }

   


      }

      }


      }

      }

      }

    
  }
  //second form when rejected


  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>فۆرمی ناردنی بەلگەنامەکان</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css">
  <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
  <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <style>
    .errorWrap {
    padding: 10px;
    margin: 20px 0 0px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div style="text-align:right" class="content-header-right col-md-12 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           ناردنی بەلگەنامەکان
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">سەرەکی</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">بەلگەنامەکان
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
             <!-- second form -->
             <?php
            $appdata='';

             $stuid = $_SESSION['uid'];
             $query = mysqli_query($con, "select * from tbladmapplications where userId=$stuid");
          
             $rw = mysqli_num_rows($query);
             if ($rw > 0) {
               
               while ($row = mysqli_fetch_array($query)) {
                 $appdata=$row;
                 $id = $row['id'];
                  
                 }
                }
                $queryforcount = mysqli_query($con, "select * from tblsecondadmapplications where userId=$stuid");
                $rwcount = mysqli_num_rows($queryforcount);
              
              if($appdata['status']=='selected' && $rwcount==0){
                ?>

<form name="submitsecond" method="post" enctype="multipart/form-data">
<section class="formatter" id="formatter">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">فۆرمی بەلگەنامەکان</h4>

          <div class="heading-elements">
            <ul class="list-inline mb-0">

              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

            </ul>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body">


          <div class="row">
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>بەرواری لە دایکبوون </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="dob" name="dob" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>رەگەزنامە </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="nationality" name="nationality" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ناوی دایک </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="motherName" name="motherName" type="text" required>
                  </div>
                </fieldset>
              </div>
            </div>


            <div class="row" align="left">
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>شوێنی ژیان</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="placeOfBreath" name="placeOfBreath" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>شوێنی مانەوە </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="placeHeSheLive" name="placeHeSheLive" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ولات</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="country" name="country" type="text" required>
                  </div>
                </fieldset>
              </div>
            
            </div>

            
            <div class="row" align="left">
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>پارێزگا</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="governate" name="governate" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>شار </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="city" name="city" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>گوند یان گەڕەک</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="village" name="village" type="text" required>
                  </div>
                </fieldset>
              </div>
            
            </div>


            <div class="row" align="left">
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ناوچە</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="state" name="state" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ژمارەی ناسنامە </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="idCardNumber" name="idCardNumber" type="number" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ژمارەی کارتی نیشتمانی یان رەگەزنامەی عێراقی</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="nationaltyNumber" name="nationaltyNumber" type="number" required>
                  </div>
                </fieldset>
              </div>
            
            </div>
      
            <div class="row" align="left">
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ژمارەی تەلەفۆنی کەسی یەکەم</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="phoneNumberFirstPerson" name="phoneNumberFirstPerson" type="number" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>ئایین </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="religion" name="religion" type="text" required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-4 col-lg-12">
                <fieldset>
                  <h5>شوێنی مانەوە</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="studentPlace" name="studentPlace" placeholder="بەشەناو خۆیی یان مالەوە" type="text" required>
                  </div>
                </fieldset>
              </div>
            
            </div>

            <div class="row">
              <div class="col-xl-6 col-lg-12">
                <fieldset>
                  <h5>ناسنامە</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="idCardFile"  name="idCardFile"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf"  required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-6 col-lg-12">
                <fieldset>
                  <h5>کارتی نیشتمانی یان رەگەزنامەی عێراقی</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="nationaltyCardFile"  name="nationaltyCardFile"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf" required>
                  </div>
                </fieldset>
              </div>
            </div>

            <div class="row">

              <div class="col-xl-6 col-lg-12">
                <fieldset>
                  <h5>بڕوانامەی پۆلی ١٢ </h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="certificate12File"  name="certificate12File"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf"  required>
                  </div>
                </fieldset>
              </div>
              <div class="col-xl-6 col-lg-12">
                <fieldset>
                  <h5>پشکنینی چاو</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="eyeTestFile"  name="eyeTestFile"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf" required>
                  </div>
                </fieldset>
              </div>
            </div>


            <div class="row">
              <div class="col-xl-6 col-lg-12">
                <fieldset>
                  <h5>پشکنینی خوێن</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="bloodTestFile"  name="bloodTestFile"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf" required>
                  </div>
                </fieldset>
              </div>
               <div class="col-xl-6 col-lg-12">
                <fieldset>
                  <h5>وەسلی پارەدان</h5>
                  <div class="form-group">
                    <input class="form-control white_bg" id="bloodTestFile"  name="payment"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf" required>
                  </div>
                </fieldset>
              </div>
          
            </div>

          
            <div class="row" style="margin-top: 2%">
              <div class="col-xl-6 col-lg-12">
                <button type="submit" name="submitSecond" class="btn btn-info btn-min-width mr-1 mb-1">ناردن</button>
              </div>
            </div>


          </div>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- Formatter end -->
</form>

                <?php }else{
                  $stuid = $_SESSION['uid'];
                  $query = mysqli_query($con, "select * from tblsecondadmapplications where userId=$stuid");
                  $rw = mysqli_num_rows($query);
                  if ($rw == 1) {
                    while ($row = mysqli_fetch_array($query)) {
                      if($row['status']=='pending'){
                        ?>
 <p style="font-size:16px; color:red" align="center">فۆرمی بەلگەنامەکان نێردرا.</p> 
 
 <br>
 <?php
                      }
                    }
                  }
                  
                } 
                
                $stuid = $_SESSION['uid'];
                $query = mysqli_query($con, "select * from tblsecondadmapplications where userId=$stuid");
                $rw = mysqli_num_rows($query);
                if ($rw == 1) {
                  while ($row = mysqli_fetch_array($query)) {
                    if($row['status']=='selected' or $row['status']=='pending'){
                      // if status is selected
                      if($row['status']=='selected'){
                        ?> 
                        <p style="font-size:16px; color:green" align="center">فۆرمی بەلگەنامەکانت پەسەندکرا</p>
                        <a class="btn btn-outline-primary" href="selected.php?aticid=<?php echo $row['id'];?>" target="_blank">چاپکردن</a>
                        <a class="btn btn-outline-primary" href="badge.php?udid=<?php echo $stuid;?>" title="Edit user details">Print Your Badge</a>

                        <?php 
                      }else{
                        // if status is pending
                        ?>
                        <p style="font-size:16px; color:red" align="center">فۆرمی بەلگەنامەکانت لە چاوەروانی دایە</p>
                        <?php 
                      }
                      ?>
                        
                        
                        
                        
                        <!-- <p style="font-size:16px; color:green" align="center">Your Second Addmission Form is Selected.</p> -->
                        <table border="1" style="text-align: right;" class="table table-bordered mg-b-0 col-xl-4 col-lg-12 ">
                          <tr>
                    <th>فۆرمی بەلگەنامەکان</th>
                    <td></td>
                  </tr>
                  <tr>
                    <td><?php  echo $row['dob'];?></td>
                    <th>بەرواری لەدایکبوون </th>
                  </td>
                  
                </tr>
                <tr>
                  <td><?php  echo $row['nationality'];?></td>
                  <th>ڕەگەزنامە </th>
                  
                </tr>
                <tr>
                  <td><?php  echo $row['motherName'];?></td>
                  <th>ناوی دایک</th>
                    
                  </tr>
                  <tr>
                    <td><?php  echo $row['placeOfBreath'];?></td>
                    <th>شوێنی لەدایک بوون</th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['placeHeSheLive'];?></td>
                    <th>شوێنی مانەوە</th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['country'];?></td>
                    <th>ولات</th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['governate'];?></td>
                  <th>پارێزگا</th>

                  </tr>

                  <tr>
                    <td><?php  echo $row['city'];?></td>
                    <th>شار</th>

                  </tr>

                  <tr>
                    <td><?php  echo $row['village'];?></td>
                    <th>گوند ، گەرەک</th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['state'];?></td>
                    <th>ناوچە</th>

                  </tr>

                  <tr>
                    <td><?php  echo $row['idCardNumber'];?></td>
                    <th>ژمارەی ناسنامە </th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['nationaltyNumber'];?></td>
                    <th>ژمارەی کارتی نیشتمانی یان رەگەزنامە </th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['phoneNumberFirstPerson'];?></td>
                    <th>ژمارەی تەلەفۆنی کەسی یەکەمت </th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['studentPlace'];?></td>
                    <th>شوێن </th>

                  </tr>
                  <tr>
                    <td><?php  echo $row['religion'];?></td>
                    <th>ئایین</th>

                  </tr>
                  <tr>
    <tr>
               
               <td colspan="2"><hr></td>
           </tr>
                  <tr>
                    <td><img src="../user/userdocs/<?php echo $row['idCardFile'];?>" width="200" height="150"></td>
                    <th>ناسنامە </th>
                  </tr>
                  <tr>
                    <td><img src="../user/userdocs/<?php echo $row['nationaltyCardFile'];?>" width="200" height="150"></td>
                    <th>کارتی نیشتمانی یان رەگەزنامەی عێراقی</th>
                  </tr>
                  <tr>
                    <td><img src="../user/userdocs/<?php echo $row['certificate12File'];?>" width="200" height="150"></td>
                    <th>بڕوانامەی پۆلی ١٢</th>
                  </tr>
                  <tr>
                    <td><img src="../user/userdocs/<?php echo $row['bloodTestFile'];?>" width="200" height="150"></td>
                    <th>پشکنینی خوێن</th>
                  </tr>
                  <tr>
                    <td><img src="../user/userdocs/<?php echo $row['eyeTestFile'];?>" width="200" height="150"></td>
                    <th>پشکنینی چاو</th>
                  </tr>
                  <tr>
                    <td><img src="../user/userdocs/<?php echo $row['payment'];?>" width="200" height="150"></td>
                    <th>پشکنینی چاو</th>
                  </tr>
                </table>
                
                      <br>
                      <?php

                    }

                    if($row['status']=='rejected'){
                      ?>


                    <form name="submitsecondreject" method="post" enctype="multipart/form-data">
                      <section class="formatter" id="formatter">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h4 class="card-title">فۆرمی بەلگەنامەکان</h4>

                              <div class="heading-elements">
                                <ul class="list-inline mb-0">

                                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                  <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                                </ul>
                              </div>
                            </div>
                            <div class="card-content">
                              <div class="card-body">
                              <div class="row">
                              <p style="font-size:16px; color:red" align="">تێبینی ئەدمین : <?php echo $row['adminNote'] ?></p>

                              </div>


                              <div class="row">
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>بەرواری لەدایکبوون</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="dob" name="dob" value="<?php  echo $row['dob'];?>" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ڕەگەزنامە </h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="nationality" value="<?php  echo $row['nationality'];?>" name="nationality" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ناوی دایک </h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="motherName" value="<?php  echo $row['motherName'];?>" name="motherName" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                </div>


                                <div class="row" align="left">
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>شوێنی لەدایکبوون</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['placeOfBreath'];?>" id="placeOfBreath" name="placeOfBreath" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>شوێنی مانەوە</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['placeHeSheLive'];?>" id="placeHeSheLive" name="placeHeSheLive" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ولات</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['country'];?>" id="country" name="country" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                
                                </div>

                                
                                <div class="row" align="left">
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>پارێزگا</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['governate'];?>" id="governate" name="governate" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>شار </h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['city'];?>" id="city" name="city" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>گوند یان گەرەک</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['village'];?>" id="village" name="village" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                
                                </div>


                                <div class="row" align="left">
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ناوچە</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['state'];?>"  id="state" name="state" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ژمارەی ناسنامە </h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['idCardNumber'];?>" id="idCardNumber" name="idCardNumber" type="number" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5> ژمارەی کارتی نیشتمانی یان رەگەزنامەی عێراقی</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['nationaltyNumber'];?>"  id="nationaltyNumber" name="nationaltyNumber" type="number" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                
                                </div>
                          
                                <div class="row" align="left">
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ژمارەی موبایلی کەسی یەکەمت</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['phoneNumberFirstPerson'];?>" id="phoneNumberFirstPerson" name="phoneNumberFirstPerson" type="number" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>ئایین </h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['religion'];?>"  id="religion" name="religion" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-4 col-lg-12">
                                    <fieldset>
                                      <h5>شوێنی مانەوە</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" value="<?php  echo $row['studentPlace'];?>"  id="studentPlace" name="studentPlace" placeholder="بەشەناو خۆیی یاخود مالەوە" type="text" required>
                                      </div>
                                    </fieldset>
                                  </div>
                                
                                </div>

                                <div class="row">
                                  <div class="col-xl-6 col-lg-12">
                                    <fieldset>
                                      <h5>ناسنامە</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="idCardFile"  name="idCardFile"  type="file"  required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-6 col-lg-12">
                                    <fieldset>
                                      <h5>کارتی نیشتمانی یان رەگەزنامەی عێراقی</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="nationaltyCardFile"  name="nationaltyCardFile"  type="file"  required>
                                      </div>
                                    </fieldset>
                                  </div>
                                </div>

                                <div class="row">

                                  <div class="col-xl-6 col-lg-12">
                                    <fieldset>
                                      <h5>بڕوانامەی پۆلی ١٢</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="certificate12File"  name="certificate12File"  type="file"  required>
                                      </div>
                                    </fieldset>
                                  </div>
                                  <div class="col-xl-6 col-lg-12">
                                    <fieldset>
                                      <h5>پشکنینی چاو</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="eyeTestFile"  name="eyeTestFile"  type="file"  required>
                                      </div>
                                    </fieldset>
                                  </div>
                                </div>


                                <div class="row">
                                  <div class="col-xl-6 col-lg-12">
                                    <fieldset>
                                      <h5>پشکنینی خوێن</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="bloodTestFile"  name="bloodTestFile"  type="file"  required>
                                      </div>
                                    </fieldset>
                                  </div>
                                 <div class="col-xl-6 col-lg-12">
                                    <fieldset>
                                      <h5>وەسلی پارەدان</h5>
                                      <div class="form-group">
                                        <input class="form-control white_bg" id="eyeTestFile"  name="payment"  type="file"  required>
                                      </div>
                                    </fieldset>
                                  </div>
                                </div>

                              
                                <div class="row" style="margin-top: 2%">
                                  <div class="col-xl-6 col-lg-12">
                                    <button type="submit" name="submitsecondreject" class="btn btn-info btn-min-width mr-1 mb-1">ناردن</button>
                                  </div>
                                </div>


                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- Formatter end -->
                    </form>

                      <?php

}

                  }
                }else{
                  ?>
                   <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                  <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                  <?php
                }
             
                ?>
            <!-- second form -->

   
 
      </div>
    </div>
  </div>
<?php include('includes/footer.php');?>
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->
  <!-- BEGIN PAGE VENDOR JS-->
  <script src="app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/morris.min.js" type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-2.0.3.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js"
  type="text/javascript"></script>
  <script src="app-assets/data/jvector/visitor-data.js" type="text/javascript"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN MODERN JS-->
  <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <!-- END MODERN JS-->
  <!-- BEGIN PAGE LEVEL JS-->
  <script src="app-assets/js/scripts/pages/dashboard-sales.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
</body>
</html>
<?php  } ?>
