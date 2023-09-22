<?php
session_start();
error_reporting(E_ALL);
include('includes/dbconnection.php');

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
    $idCode = (int)$_POST['idCode'];
    $kuLastName = 'null';
    $kuSecondName = $_POST['kuSecondName'];
    $kuFirstName = $_POST['kuFirstName'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $adminNote = ' '; // You can add more logic to set the adminNote value if needed

    $userpic = md5($_FILES["image"]["name"]) . $extension;

    $query = "INSERT INTO `tbladmapplications` (`userId`, `gender`, `image`, `firstName`, `lastName`, `kuFirstName`, `kuLastName`, `idCode`, `facultyId`, `departmentId`, `kuSecondName`, `secondName`, `adminNote`)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ssssssiiissss", $userId, $gender, $userpic, $firstName, $lastName, $kuFirstName, $kuLastName, $idCode, $facultyId, $departmentId, $kuSecondName, $secondName, $adminNote);

    if (mysqli_stmt_execute($stmt)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "userimages/" . $userpic);
        echo '<script>alert("Data has been added successfully.")</script>';
        echo "<script>window.location.href ='addmission-form.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again.")</script>';
        echo "<script>window.location.href ='addmission-form.php'</script>";
    }

    mysqli_stmt_close($stmt);
}
  //second submit for first form 
	if (isset($_POST['submit2'])) {
    // Validate and sanitize user inputs
    $appId = (int)$_POST['appId'];
    $userId = $_SESSION['uid'];
    $gender = $_POST['gender'];
    $facultyId = (int)$_POST['facultyId'];
    $departmentId = (int)$_POST['depName'];
    $idCode = $_POST['idCode'];
    $kuLastName ='null';
    $kuSecondName = $_POST['kuSecondName'];
    $kuFirstName = $_POST['kuFirstName'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $status = 'pending';

    // File upload handling
    $upic = $_FILES["image"]["name"];
    $extension = pathinfo($upic, PATHINFO_EXTENSION);

    // Allowed file extensions
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");

    if (in_array(strtolower($extension), $allowed_extensions)) {
        // Rename user pic with a unique name
        $userpic = md5(uniqid()) . "." . $extension;

        // Move uploaded file to the destination directory
        $upload_directory = "userimages/";
        move_uploaded_file($_FILES["image"]["tmp_name"], $upload_directory . $userpic);

        // Update the database record using prepared statement
        $query = "UPDATE `tbladmapplications` SET 
            `gender`=?, `image`=?, `firstName`=?, `lastName`=?, `kuFirstName`=?,
            `kuLastName`=?, `idCode`=?, `facultyId`=?, `departmentId`=?, `kuSecondName`=?,
            `secondName`=?, `status`=? WHERE `id`=?";
        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssssssiiissssi", $gender, $userpic, $firstName, $lastName, $kuFirstName, $kuLastName, $idCode, $facultyId, $departmentId, $kuSecondName, $secondName, $status, $appId);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('First Form Updated.');</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }

    // Redirect back to the form page
    echo "<script>window.location.href ='addmission-form.php'</script>";
}





?>
  <!DOCTYPE html>
  <html class="loading" lang="en" data-textdirection="ltr">

  <head>

    <title>College Addmission Management System|| Addmission Form</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/extended/form-extended.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
      .errorWrap {
        padding: 10px;
        margin: 20px 0 0px 0;
        background: #fff;
        border-left: 4px solid #dd3d36;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }

      .succWrap {
        padding: 10px;
        margin: 0 0 20px 0;
        background: #fff;
        border-left: 4px solid #5cb85c;
        -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
      }
    </style>
  </head>

  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include('includes/header.php'); ?>
    <?php include('includes/leftbar.php'); ?>
    
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">
              Admission Application Form
            </h3>
            <?php
          $stuid = $_SESSION['uid'];
          $query = mysqli_query($con, "select * from tbladmapplications where userId=$stuid");
          
          $rw = mysqli_num_rows($query);
          if ($rw > 0) {
            while ($row = mysqli_fetch_array($query)) {
              $appdata=$row;
              $id = $row['id'];

              }
            }
              ?>

            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                  </li>

                  </li>
                  <li class="breadcrumb-item active">Application
                  </li>
                </ol>
              </div>
            </div>
          </div>

        </div>
        <div class="content-body">
          <?php
          $stuid = $_SESSION['uid'];
          $query = mysqli_query($con, "select * from tbladmapplications where userId=$stuid");
          
          $rw = mysqli_num_rows($query);
          if ($rw > 0) {
            while ($row = mysqli_fetch_array($query)) {
              $appdata=$row;
              $id = $row['id'];
              if($row['status']=='pending'){

              
          ?>


              <!-- <p style="font-size:16px; color:red" align="center">Your Addmission Form already submitted.</p> -->
            
              <br>
              
              <?php
              }

              if($row['status']=='rejected'){
                ?>

            <!-- first form when rejected-->

            <form name="submitrejected" accept-charset="UTF-8"  method="post" enctype="multipart/form-data">
              <section class="formatter" id="formatter">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Addimission Form</h4>

                        <div class="heading-elements">
                          <ul class="list-inline mb-0">

                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                          </ul>
                        </div>
                      </div>
                      <div class="card-content">
                        <div class="card-body">

                        <input type="hidden"  name="appId" value="<?php echo $row['id'] ?>">
                        <div class="row">
                        <p style="font-size:16px; color:red" align="center">admin Note : <?php echo $row['adminNote'] ?></p>

                        </div>


                        <div class="row">
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>First Name </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="firstName" name="firstName" value="<?php echo $row['firstName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>Second Name </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="secondName" name="secondName"  value="<?php echo $row['secondName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>Last Name </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="lastName" name="lastName"  value="<?php echo $row['lastName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                          </div>


                          <div class="row" align="right">
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سیانیت </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuFirstName" name="kuFirstName"  value="<?php echo $row['kuFirstName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <br>
                            <div  class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5> ژمارەی موبایل </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuSecondName" name="kuSecondName" value="<?php echo $row['kuSecondName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <!--
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سێیەم </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuLastName" name="kuLastName" value="<?php //echo $row['kuLastName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
              -->
                          </div>
                          <div class="row">
                          <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>Gender </h5>
                                <div class="form-group">

                                  <select class="form-control white_bg" id="gender" name="gender" required>
                                    <option value="Male" <?php if($row['genderStatus']=='Male') echo 'selected'; ?> >Male</option>
                                    <option value="Female" <?php if($row['genderStatus']=='Female') echo 'selected'; ?>>Female</option>
                                    <option value="Transgender" <?php if($row['genderStatus']=='Transgender') echo 'selected'; ?>>Transgender</option>
                                  </select>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>


                                <h5>Id Code </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="idCode" name="idCode" value="<?php echo $row['idCode'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>Faculty </h5>
                                <div class="form-group">
                                  <select name='facultyId' id="facultyId" class="form-control white_bg" required="true">
                                    <?php $query = mysqli_query($con, "select * from tblfaculty");
                                    while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                      <option value="<?php echo $row1['id']; ?>" <?php if($row['facultyId']==$row1['id']) echo 'selected'; ?>><?php echo $row1['name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </fieldset>
                              <fieldset>
                                <h5>Department </h5>
                                <div class="form-group">
                                  <select name='departmrntId' id="facultyId" class="form-control white_bg" required="true">
                                    <?php $query = mysqli_query($con, "select * from tbldep");
                                    while ($row1 = mysqli_fetch_array($query)) {
                                    ?>
                                      <option value="<?php echo $row1['id']; ?>" <?php if($row['departmentId']==$row1['id']) echo 'selected'; ?>><?php echo $row1['name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </fieldset>

                            </div>
                          </div>

           
                          <div class="row">
                            <div class="col-xl-6 col-lg-12">
                              <fieldset>
                                <h5>Image</h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="image"  name="image"  type="file"  required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          
                      
                          <div class="row" style="margin-top: 2%">
                            <div class="col-xl-6 col-lg-12">
                              <button type="submit" name="submit2" class="btn btn-info btn-min-width mr-1 mb-1">Submit Again</button>
                            </div>
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </section>
            <?php } ?>
            <!-- Formatter end -->
            </form>

            <!-- first form when rejected-->
              
                <?php
             
             
            }
          } else { ?>

             <!-- first form -->

            <form name="submit" accept-charset="UTF-8" method="post" enctype="multipart/form-data">
              <section class="formatter" id="formatter">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Addimission Form</h4>

                        <div class="heading-elements">
                          <ul class="list-inline mb-0">

                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>

                          </ul>
                        </div>
                      </div>
                      <div class="card-content">
                        <div class="card-body">

                          
                          <div align="right" class="row">
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سێهەمت بە ئینگلیزی </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="lastName" name="lastName" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                            <fieldset>
                              <h5>ناوی دووەمت بە ئینگلیزی  </h5>
                              <div class="form-group">
                                <input class="form-control white_bg" id="secondName" name="secondName" type="text" required>
                              </div>
                            </fieldset>
                          </div>
                          <div  class="col-xl-4 col-lg-12">
                            <fieldset>
                              <h5>ناوی یەکەمت بە ئینگلیزی </h5>
                              <div class="form-group">
                                <input class="form-control white_bg" id="firstName" name="firstName" type="text" required>
                              </div>
                            </fieldset>
                          </div>
                          </div>


                          <div class="row" align="right">
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سیانیت بە کوردی </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuFirstName" name="kuFirstName" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                           
                            <!-- <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سێیەم </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuLastName" name="kuLastName" type="text" required>
                                </div>
                              </fieldset>
                            </div> -->
                          
                          </div>
                          <div class="row" align="right">
                          <div  class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ژمارەی موبایل </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuSecondName" name="kuSecondName" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          <div class="row" align="right">
                          <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ڕەگەز </h5>
                                <div class="form-group">

                                  <select class="form-control white_bg" id="gender" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                </div>
                              </fieldset>
                            </div>
                            <div  align="right" class="col-xl-4 col-lg-12">
                              <fieldset>


                                <h5>ژمارەی نازنامە </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="idCode" name="idCode" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div align="right" class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>فاکەلتی </h5>
                                <div class="form-group">
                                  <select name='facultyId' id="facultyId" class="form-control white_bg" required="true">
                                    <?php $query = mysqli_query($con, "select * from tblfaculty");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </fieldset>
                              <fieldset>
                                <h5>بەش </h5>
                                <div class="form-group">
                                  <select name='departmentId' id="facultyId" class="form-control white_bg" required="true">
                                    <?php $query = mysqli_query($con, "select * from tbldep");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                  </select>
                                </div>
                              </fieldset>
                              

                            </div>
                          </div>


                          <div class="row">
                         

                            <div align="right" class="col-xl-6 col-lg-12">
                              <fieldset>
                                <h5>وێنەی خۆت </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="image" name="image" type="file" required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                         
                         
                      
                          <div class="row" style="margin-top: 2%">
                            <div class="col-xl-6 col-lg-12">
                              <button type="submit" name="submit1" class="btn btn-info btn-min-width mr-1 mb-1">Submit</button>
                            </div>
                          </div>


                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </section>
            <?php } ?>
            <!-- Formatter end -->
            </form>

            <!-- first form -->


            <!-- second form -->
            <?php

              if($appdata['status']=='selected' or $appdata['status']=='pending'){
                if($appdata['status']=='selected'){
                  ?> 
                  <p style="font-size:16px; color:green" align="center">Your First Addmission Form is Selected.</p>
                  <?php 
                }else{
                  // if status is pending
                  ?>
                  <p style="font-size:16px; color:red" align="center">Your First Addmission Form is Submited and on  Review.</p>
                  <?php 
                }

                 // second form when selected or pending

                $cid = $appdata['id'];

                $row=$appdata;
                $ret=mysqli_query($con,"SELECT tbladmapplications.*, tblfaculty.name AS facultyName, tbldep.name AS depName, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Email
FROM tbladmapplications
INNER JOIN tbluser ON tbluser.id = tbladmapplications.userId
INNER JOIN tblfaculty ON tbladmapplications.facultyId = tblfaculty.id
INNER JOIN tbldep ON tbladmapplications.departmentId = tbldep.id
WHERE tbladmapplications.id = '$cid';");
$cnt=1;
while ($roww=mysqli_fetch_array($ret)) {
$row=$roww;
}
                ?>
                                      <!-- <p style="font-size:16px; color:green" align="center">Your first Addmission Form is Selected.</p> -->

                <table border="1" class="table table-bordered mg-b-0">
                <tr>
    <th>Course Applied (First Form)</th>
    <!-- <td><a class="btn btn-outline-primary" href="selected.php?aticid=<?php echo $row['id'];?>" target="_blank">Print</a></td> -->
  </tr>
  <tr>
    <th> ناوی یەکەمی قوتابی بە ئینگلیزی</th>
    <td><?php  echo $row['firstName'];?></td>
    </td>

  </tr>
  <tr>
    <th>ناوی دووەمی قوتابی بە ئینگلیزی</th>
    <td><?php  echo $row['secondName'];?></td>

  </tr>
  <tr>
    <th>ناوی سێهەمی قوتابی بە ئینگلیزی</th>
    <td><?php  echo $row['lastName'];?></td>

  </tr>
  <tr>
    <th>ناوی سیانی قوتابی بە کوردی</th>
    <td><?php  echo $row['kuFirstName'];?></td>

  </tr>
  <tr>
    <th>ژمارەی موبایل</th>
    <td><?php  echo $row['kuSecondName'];?></td>

  </tr>
  
  <tr>
  <th>وێنەی قوتابی</th>
  <td><img src="../user/userimages/<?php echo $row['image'];?>" width="200" height="150"></td>

</tr>

<tr>
    <th>ڕەگەز</th>
    <td><?php  echo $row['gender'];?></td>

  </tr>
  
  <tr>
    <th>ژماوەی ڕەگەزنامە</th>
    <td><?php  echo $row['idCode'];?></td>

  </tr>
  <tr>
    <th>فاکەلتی</th>
    <td><?php  echo $row['facultyName'];?></td>

  </tr>
  <tr>
    <th>بەش</th>
    <td><?php  echo $row['depName'];?></td>

                </table>
                <?php
              } 
                ?>
        </div>
      </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js" type="text/javascript"></script>
    <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/forms/extended/card/jquery.card.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/extended/form-typeahead.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/extended/form-inputmask.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/extended/form-formatter.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/extended/form-maxlength.js" type="text/javascript"></script>
    <script src="app-assets/js/scripts/forms/extended/form-card.js" type="text/javascript"></script>
  </body>

  </html>
<?php  } ?>