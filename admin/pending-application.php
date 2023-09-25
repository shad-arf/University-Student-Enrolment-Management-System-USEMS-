<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>College Admission Management System|| Pending Application</title>
  <?php include('../include/links.php');?>

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
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           View Application
          </h3>

          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Pending Application
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
<table class="table mb-0">
<caption>First Application</caption>

 <thead>
                <tr>
                <th> </th>

                  <th>First Name</th>
                  <th>Second Name</th>
                  <th>Third Name</th>
                  <th>Id Code</th>
                   <th>Action</th>
                  <th>More</th>

                </tr>
              </thead>
              <?php
$admid = $_SESSION['aid'];
// Get admin id from tbladmin where id is equal to session id
$ret = mysqli_query($con, "select * from tbladmin where ID='$admid'");
$row = mysqli_fetch_array($ret);
$type = $row['type'];

if ($type == 'super_admin') {
    $ret = mysqli_query($con, "SELECT *  FROM tbladmapplications WHERE status='pending' ");
} 

$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {
  ?>
      <tr>
          <td><?php echo $cnt; ?></td>
          <td><?php echo $row['firstName']; ?></td>
          <td><?php echo $row['secondName']; ?></td>
          <td><?php echo $row['lastName']; ?></td>
          <td><?php echo $row['userId']; ?></td>
          <td><?php echo $row['status']; ?></td>
          <td><a href="view-appform.php?aticid=<?php echo $row['userId'];?>" target="_blank">View Details</a></td>
      </tr>
      <?php
      $cnt = $cnt + 1;
  } ?>


</table>

<table class="table mb-0">
<caption>Second Application</caption>

 <thead>
 <tr>
                <th> </th>

                <th>idCardNumber</th>
                <th>City</th>
                <th>Id Code</th>
                <th>Action</th>
                <th>More</th>
                </tr>
              </thead>
  <?php
   
   if($type =='super_admin'){
     $ret=mysqli_query($con,"SELECT * FROM  tblsecondadmapplications WHERE  status='pending'");

   }   
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
                  <td><?php  echo $row['idCardNumber'];?></td>
                  <td><?php  echo $row['city'];?></td>
                  <td><?php  echo $row['userId'];?></td>
                  <td><?php  echo $row['status'];?></td>

                  <td><a href="view-secondappform.php?aticid=<?php echo $row['userId'];?>" target="_blank">View Details</a></td>

                </tr>
                <?php 
$cnt=$cnt+1;
}?>


</table>





     

</div>
      </div>
      </div>

    
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('includes/footer.php');?>
<?php include('includes/footerjs.php'); ?>

 
</body>
</html>
<?php  } ?>
