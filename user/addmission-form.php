<?php
session_start();
error_reporting(0);
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
    $facultyId = $_POST['facultyId'];
    $departmentId = $_POST['departmentId'];
    $idCode = $_POST['idCode'];
    $kuLastName = 'null';
    $kuSecondName = $_POST['kuSecondName'];
    $kuFirstName = $_POST['kuFirstName'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $secondName = $_POST['secondName'];
    $adminNote = ' '; // You can add more logic to set the adminNote value if needed
    $upic = $_FILES["image"]["name"];
    $extension = pathinfo($upic, PATHINFO_EXTENSION);

    // Allowed file extensions
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    $userpic = md5($_FILES["image"]["name"]) . $extension;

    $query = "INSERT INTO `tbladmapplications` (`userId`, `gender`, `image`, `firstName`, `lastName`, `kuFirstName`, `kuLastName`, `idCode`, `facultyId`, `departmentId`, `kuSecondName`, `secondName`, `adminNote`)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $query);

    mysqli_stmt_bind_param($stmt, "sssssssssssss", $userId, $gender, $userpic, $firstName, $lastName, $kuFirstName, $kuLastName, $idCode, $facultyId, $departmentId, $kuSecondName, $secondName, $adminNote);

    if (mysqli_stmt_execute($stmt)) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "userimages/" . $userpic);
        echo '<script>alert("زانیارییەکە زیادکرا بە سەرکەوتووی")</script>';
        echo "<script>window.location.href ='addmission-form.php'</script>";
    } else {
        echo '<script>alert("شتێکی هەلە ڕوویدا دووبارە هەولبدە .")</script>';
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
    $facultyId = $_POST['facultyId'];
    $departmentId = $_POST['departmentId'];
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
        mysqli_stmt_bind_param($stmt, "ssssssssssssi", $gender, $userpic, $firstName, $lastName, $kuFirstName, $kuLastName, $idCode, $facultyId, $departmentId, $kuSecondName, $secondName, $status, $appId);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('فۆرمی ناردنت نوێبۆوە');</script>";
        } else {
            echo "<script>alert('شتێکی هەلە ڕوویدا دووبارە هەولبدە ');</script>";
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('فایلی وێنەکەت هەیە، فایلی وێنەکەت پێویستە ئەو فۆرماتانە بێت jpg / jpeg/ png /gif/pdf');</script>";
    }

    // Redirect back to the form page
    echo "<script>window.location.href ='addmission-form.php'</script>";
}





?>
  <!DOCTYPE html>
  <html class="loading" lang="en" data-textdirection="ltr">

  <head>

    <title> فۆرمی وەرگرتنی قوتابیان</title>
    <?php include('../include/links.php');?>
  
 <style>
      .errorWrap {
        padding: 10px;
        margin: s20px 0 0px 0;
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
    
    <div  style="text-align: right; " class="app-content content">
      <div class="content-wrapper">
        <div  class=" content-header row">
          <div class="content-header-left col-md-12 col-12 mb-12 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">
              فۆڕمی پێشکەشکردنی داواکاری 
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

            <div  class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb" style="font-size:x-large">
                  <li class="breadcrumb-item"><a href="dashboard.php">سەرەکی</a>
                  </li>

                  </li>
                  <li class="breadcrumb-item active">داواکاری
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
                       
                        <div class="heading-elements">
                          <ul class="list-inline mb-0">

                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>     
                           

                          </ul>
                          <div  class="row">
                        <p style="font-size:16px; color:red; align:right ; font-weight: bold; " >:تێبینی ئەدمین  <?php echo $row['adminNote'] ?></p>

                        </div>
                        </div>
                      </div>
                      <br>
                      <div  class="card-content">
                        <div class="card-body">

                        <input type="hidden"  name="appId" value="<?php echo $row['id'] ?>">
                   


                        <div class="row">
                        <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سێییەمت بە ئینگلیزی</h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="lastName" name="lastName"  value="<?php echo $row['lastName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                           
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی دووەمت بە ئینگلیزی </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="secondName" name="secondName"  value="<?php echo $row['secondName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی یەکەمت بە ئینگلیزی </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="firstName" name="firstName" value="<?php echo $row['firstName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                           
                          </div>


                          <div class="row" >
                            <div style="padding-left:68%" class="col-xl-12 col-lg-12 text-right">
                              <fieldset>
                                <h5>ناوی سیانیت </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuFirstName" name="kuFirstName"  value="<?php echo $row['kuFirstName'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          <br>
                            <div  style="padding-left:68%" class="col-xl-12 col-lg-12 text-right">
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
                                <h5>ڕەگەز </h5>
                                <div class="form-group">

                                  <select class="form-control white_bg" id="gender" name="gender" required>
                                    <option value="نێر" <?php if($row['gender']=='نێر') echo 'selected'; ?> >نێر</option>
                                    <option value="مێ" <?php if($row['gender']=='مێ') echo 'selected'; ?>>مێ</option>
                                   </select>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>


                                <h5>ژمارەی ڕەگەزنامە </h5>
                                <div class="form-group">
                                <input class="form-control white_bg" id="idCode" name="idCode" value="<?php echo $row['idCode'] ?>" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>فاکەلتی </h5>
                                <div class="form-group">
                                <input class="form-control white_bg" id="idCode" name="facultyId" value="<?php echo $row['idCode'] ?>" type="text" required>

                                </div>
                              </fieldset>
                              <fieldset>
                                <h5>بەش </h5>
                                <div class="form-group">
                                <input class="form-control white_bg" id="idCode" name="departmentId" value="<?php echo $row['idCode'] ?>" type="text" required>

                              </fieldset>

                            </div>
                          </div>

           
                          <div class="row">
                            
                            <div style="padding-left:68%" class="col-xl-12 col-lg-12 text-right">
                              <fieldset>
                                <h5>وێنە </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="image"  name="image"  type="file" accept=".jpg, .jpeg, .png, .gif, .pdf"  required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                          
                      
                          <div class="row" style="margin-top: 2%">
                            <div class="col-xl-6 col-lg-12">
                              <button type="submit" name="submit2" class="btn btn-info btn-min-width mr-1 mb-1">دووبارە ناردنەوە</button>
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
                                <h5>ناوی سێییەمت بە ئینگلیزی </h5>
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


                          <div class="row ">
                            <div style="padding-left:68%" class="col-xl-12 col-lg-12 text-right">
                              <fieldset>
                                <h5>ناوی سیانیت بە کوردی </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuFirstName" name="kuFirstName" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                           
                            <!-- <div class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>ناوی سێیەم </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuLastName" name="kuLastName" type="text" required>
                                </div>
                              </fieldset>
                            </div> -->
                          
                          <div class="row" >
                          <div   style="padding-left:68%" class="col-xl-12 col-lg-12 text-right">
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
                                   
                                    <option value="نێر">نێڕ</option>
                                    <option value="مێ">مێ</option>
                                  </select>
                                </div>
                              </fieldset>
                            </div>
                            <div  align="right" class="col-xl-4 col-lg-12">
                              <fieldset>


                                <h5>ژمارەی نازنامە </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="kuSecondName" name="idCode" type="text" required>
                                </div>
                              </fieldset>
                            </div>
                            <div align="right" class="col-xl-4 col-lg-12">
                              <fieldset>
                                <h5>فاکەلتی </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="idCode" name="facultyId" type="text" required>
                                   
                                </div>
                              </fieldset>
                              <fieldset>
                                <h5>بەش </h5>
                                <div class="form-group">
                                    <input class="form-control white_bg" id="idCode" name="departmentId" type="text" required>

                                </div>
                              </fieldset>
                              

                            </div>
                          </div>


                          <div class="row">
                         

                            <div  style="padding-left:68%" class="col-xl-12 col-lg-12 text-right">
                              <fieldset>
                                <h5>وێنەی خۆت </h5>
                                <div class="form-group">
                                  <input class="form-control white_bg" id="image" accept=".jpg, .jpeg, .png, .gif, .pdf" name="image" type="file" required>
                                </div>
                              </fieldset>
                            </div>
                          </div>
                         
                         
                      
                          <div class="row" style="margin-top: 2%">
                            <div class="col-xl-6 col-lg-12">
                              <button type="submit" name="submit1" class="btn btn-info btn-min-width mr-1 mb-1">ناردن</button>
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
                  <p style="font-size:16px; color:green" align="center">داواکارییەکەت وەگیرا</p>
                  <?php 
                }else{
                  // if status is pending
                  ?>
                  <p style="font-size:16px; color:red" align="center">داواکاریەکەت لەژێر چاوەروانیدایە </p>
                  <?php 
                }

                 // second form when selected or pending

                $cid = $appdata['id'];

                $row=$appdata;
                $ret=mysqli_query($con,"SELECT * FROM tbladmapplications where userId=$stuid");
$cnt=1;
while ($roww=mysqli_fetch_array($ret)) {
$row=$roww;
}
                ?>
                                      <!-- <p style="font-size:16px; color:green" align="center">Your first Addmission Form is Selected.</p> -->

                <table border="1" class="table table-bordered mg-b-0">
                <tr>
    <th>زانیاری فۆرمی وەرگرتنی قوتابی</th>
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
    <th>ناوی سێییەمی قوتابی بە ئینگلیزی</th>
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
    <td><?php  echo $row['facultyId'];?></td>

  </tr>
  <tr>
    <th>بەش</th>
    <td><?php  echo $row['departmentId'];?></td>

                </table>
                <?php
              } 
                ?>
        </div>
      </div>
    </div>
    
    <?php include('includes/footer.php'); ?>

  </body>

  </html>
<?php  } ?>