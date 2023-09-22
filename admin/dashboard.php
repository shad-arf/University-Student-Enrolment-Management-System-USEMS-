<?php
session_start();
include('includes/dbconnection.php');
if(strlen($_SESSION['aid'])==0){
header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <title>College Admission Management System | Dashboard</title>
  <?php include('../include/links.php');?>
  </head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
   <?php include_once('includes/header.php');?>
 <?php include_once('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <!-- <div class="content-body">
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <a href="manage-faculty.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
// $sql =mysqli_query($con ,"SELECT id from tblfaculty");
// $cntcourse=mysqli_num_rows($sql);

?>
 <h3 class="info"><?php //echo $cntcourse;?></h3>
                      <h6>Listed Faculties</h6>
                    </div>
                    <div>
         <i class="icon-file success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div> -->
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="user-detail.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
$wer =mysqli_query($con ,"SELECT id from student_data");
$cntuser=mysqli_num_rows($wer);
 ?>
 <h3 class="warning"><?php echo $cntuser;?></h3>
                      <h6>Register Users</h6>
                    </div>
                    <div>
    <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                 <a href="all-application.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
   $admid=$_SESSION['aid'];
   // get admin id from tbladmin where id is equal to session id
 $ret=mysqli_query($con,"select * from tbladmin where ID='$admid'");
 $row=mysqli_fetch_array($ret);
 $type = $row['type'];   
 if($type=='super_admin'){
$ter =mysqli_query($con ,"SELECT id from tbladmapplications");
 }
 else{
$ter =mysqli_query($con ,"SELECT id from tbladmapplications where tbladmapplications.facultyId='$type'");
 }

$cntapp=mysqli_num_rows($ter);
?>

<h3 class="success"><?php echo $cntapp ;?></h3>
                      <h6>Total Applications</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
          </div>
      <div class="row">
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <a href="pending-application.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
?>
<?php 
   $admid=$_SESSION['aid'];
   // get admin id from tbladmin where id is equal to session id
 $ret=mysqli_query($con,"select * from tbladmin where ID='$admid'");
 $row=mysqli_fetch_array($ret);
 $type = $row['type'];   
 if($type=='super_admin'){
  $rtp =mysqli_query($con ,"SELECT id from tbladmapplications where status='pending'");
}
 else{
  $rtp =mysqli_query($con ,"SELECT id from tbladmapplications where status='pending' and tbladmapplications.facultyId='$type'");
}

 $penapp=mysqli_num_rows($rtp);
 ?>
 <h3 class="info"><?php echo $penapp;?></h3>
                      <h6>Pending Applications</h6>
                    </div>
                    <div>
         <i class="icon-file success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="selected-application.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
 ?>
 <?php 
   $admid=$_SESSION['aid'];
   // get admin id from tbladmin where id is equal to session id
 $ret=mysqli_query($con,"select * from tbladmin where ID='$admid'");
 $row=mysqli_fetch_array($ret);
 $type = $row['type'];   
 if($type=='super_admin'){
  $yui =mysqli_query($con ,"SELECT id from tbladmapplications where status='selected'");
}
 else{
  $yui =mysqli_query($con ,"SELECT id from tbladmapplications where status='selected' and tbladmapplications.facultyId='$type'");
}

 $selapp=mysqli_num_rows($yui);
 ?>
 <h3 class="warning"><?php echo $selapp;?></h3>
                      <h6>Selected Application</h6>
                    </div>
                    <div>
    <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%"
                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <a href="rejected-application.php"> 
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
<?php 
?>
<?php 
   $admid=$_SESSION['aid'];
   // get admin id from tbladmin where id is equal to session id
 $ret=mysqli_query($con,"select * from tbladmin where ID='$admid'");
 $row=mysqli_fetch_array($ret);
 $type = $row['type'];   
 if($type=='super_admin'){
  $poi =mysqli_query($con ,"SELECT id from tbladmapplications where status='rejected'");
}
 else{
  $poi =mysqli_query($con ,"SELECT id from tbladmapplications where status='rejected' and tbladmapplications.facultyId='$type'");
}

 $rejapp=mysqli_num_rows($poi);
 ?>
<h3 class="success"><?php echo $rejapp ;?></h3>
                      <h6>Rejected Application</h6>
                    </div>
                    <div>
                      <i class="icon-user-follow success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
          </div>
        </div>
        </div></div></div>
       
<?php include('includes/footer.php');?>

</body>
</html>
<?php } ?>