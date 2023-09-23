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

  <title>College Addmission Management System</title>
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
           Upload Documents
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Documents
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
<?php 
$studoc=$_GET['docid'];
if($studoc=="")
{ ?>
  <p style="font-size:16px; color:red" align="center">Student not uploaded file yet. </p>

<?php  } else { 

$query=mysqli_query($con,"select * from tbldocument where  ID=$studoc");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>


<table class="table mb-0">

<tr>
  <th>Transfer Certificate</th>
  <td><a href="../user/userdocs/<?php echo $row['TransferCertificate'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>10th Marksheet</th>
  <td><a href="../user/userdocs/<?php echo $row['TenMarksheeet'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>12th Marksheet</th>
  <td><a href="../user/userdocs/<?php echo $row['TwelveMarksheet'];?>" target="_blank">View File </a></td>
</tr>
<tr>
  <th>Graduation Certificate</th>
  <td>
<?php if($row['GraduationCertificate']==""){ ?>
  NA
<?php } else{ ?>
    <a href="../user/userdocs/<?php echo $row['GraduationCertificate'];?>" target="_blank">View File </a>
<?php } ?>
  </td>
</tr>

<tr>
  <th>Graduation Certificate</th>
  <td>
<?php if($row['PostgraduationCertificate']==""){ ?>
  NA
<?php } else{ ?>
    <a href="../user/userdocs/<?php echo $row['PostgraduationCertificate'];?>" target="_blank">View File </a>
<?php } ?>
  </td>
</tr>

</table>





<?php } } }  ?>

 
     


      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('includes/footer.php');?>

<?php include('includes/footerjs.php'); ?>

</body>
</html>
<?php  } ?>
