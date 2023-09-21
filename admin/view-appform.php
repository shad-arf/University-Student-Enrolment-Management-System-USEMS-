<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


    if(isset($_POST['rejected']))
    {
      $cid=$_GET['aticid'];

      $adminNote=$_POST['adminNote'];

        $query=mysqli_query($con, "UPDATE tbladmapplications set status='rejected',adminNote='$adminNote' where userId='$cid'");
        if ($query) {
          echo '<script>alert("you are rejected that Application .")</script>';
          echo "<script>window.location.href ='pending-application.php'</script>";

        }else{

        }
      

      
    }

if(isset($_POST['selected']))
  {
$cid=$_GET['aticid'];
// $admrmk=$_POST['AdminRemark'];
// $admsta=$_POST['status'];
// $toemail=$_POST['useremail'];

$query=mysqli_query($con, "UPDATE  tbladmapplications set status='selected' where userId='$cid'");
if ($query) {


// $subj="Admission Application Status";       
// $heade .= "MIME-Version: 1.0"."\r\n";
// $heade .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
// $heade .= 'From:CAMS<noreply@yourdomain.com>'."\r\n";    // Put your sender email here
// $msgec.="<html></body><div><div>Hello,</div></br></br>";
// $msgec.="<div style='padding-top:8px;'>Your Admission application has been $$admsta ) </br>
// <strong>Admin Remark: </strong> $admrmk </div><div></div></body></html>";
// mail($toemail,$subj,$msgec,$heade);
echo "<script>alert('Admin Remark and  Status has been updated.');</script>";
echo "<script>window.location.href ='pending-application.php'</script>";

}else{
   echo "<script>alert('Something Went Wrong. Please try again.');</script>";
   echo "<script>window.location.href ='pending-application.php'</script>";
    }

  
}
  

  ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>College Addmission Management System|| View Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">
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
           View First Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application Form
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
$cid=$_GET['aticid'];
$ret=mysqli_query($con,"SELECT * FROM tbladmapplications WHERE userId=$cid");
// $ret=mysqli_query($con,"SELECT tbladmapplications.*, tblfaculty.name AS facultyName, tbldep.name AS depName, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Email
// FROM tbladmapplications
// INNER JOIN tbluser ON tbluser.id = tbladmapplications.userId
// INNER JOIN tblfaculty ON tbladmapplications.facultyId = tblfaculty.id
// INNER JOIN tbldep ON tbladmapplications.departmentId = tbldep.id
// WHERE tbladmapplications.id = '$cid';");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="1" class="table table-bordered mg-b-0">
<form name="submit" method="post" enctype="multipart/form-data">

   <tr>
    <th>Course Applied (First Form)</th>
  </tr>
  <tr>
    <th>Student First Name</th>
    <td><?php  echo $row['firstName'];?></td>
    </td>

  </tr>
  <tr>
    <th>Student Second Name</th>
    <td><?php  echo $row['secondName'];?></td>

  </tr>
 
  <tr>
    <th>Student Kurdish First Name</th>
    <td><?php  echo $row['kuFirstName'];?></td>

  </tr>
  <tr>
    <th>Student Kurdish Second Name</th>
    <td><?php  echo $row['kuSecondName'];?></td>

  </tr>
  <tr>
    <th>Student Kurdish Last Name</th>
    <td><?php  echo $row['kuLastName'];?></td>

  </tr>
  <tr>
  <th>Student Pic</th>
  <td><img src="../user/userimages/<?php echo $row['image'];?>" width="200" height="150"></td>

</tr>

<tr>
    <th>Student Gender</th>
    <td><?php  echo $row['gender'];?></td>

  </tr>
  
  <tr>
    <th>Student Id Code</th>
    <td><?php  echo $row['idCode'];?></td>

  </tr>
  <tr>
    <th>Student Faculty</th>
    <td><?php  echo $row['facultyName'];?></td>

  </tr>
  <tr>
    <th>Student Department</th>
    <td><?php  echo $row['depName'];?></td>

  </tr>
  <?php if( $row['status'] == 'pending'){?>
  <tr>
    <th>Admin Note</th>
    <td>
      <textarea name="adminNote"><?php  echo $row['adminNote'];?></textarea>
    </td>

  </tr>
  <?php }?>
  
  
  <tr align="center">
    <td colspan="3">
      <button type="submit" name="rejected" value='rejected' class="btn btn-danger">Rejected</button>
      <button type="submit" name="selected" value='selected' class="btn btn-success">Selected</button>

    </td>

  </tr>

</form>
</table>

<?php } ?>

      
        


            





<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
</div>
</div>



 </div>
                </div>
              </div>
            
     

<?php include('includes/footer.php');?>
  <!-- BEGIN VENDOR JS-->
  <script src="app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>

  <script src="app-assets/vendors/js/forms/extended/typeahead/typeahead.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/bloodhound.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/typeahead/handlebars.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/inputmask/jquery.inputmask.bundle.min.js"
  type="text/javascript"></script>
  <script src="app-assets/vendors/js/forms/extended/formatter/formatter.min.js"
  type="text/javascript"></script>
  <script src="../../../app-assets/vendors/js/forms/extended/maxlength/bootstrap-maxlength.js"
  type="text/javascript"></script>
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
