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
      var_dump($adminNote);
      $query=mysqli_query($con, "update tblsecondadmapplications set status='rejected',adminNote='$adminNote' where id='$cid'");
        if ($query) {
          echo '<script>alert("you are rejected that Application .")</script>';
          echo "<script>window.location.href ='dashboard.php'</script>";
        }
      else{
        echo "<script>alert('Please Select The Wrong Fields.');</script>";

      }

      
    }

if(isset($_POST['selected']))
  {
$cid=$_GET['aticid'];
// $admrmk=$_POST['AdminRemark'];
// $admsta=$_POST['status'];
// $toemail=$_POST['useremail'];

$query=mysqli_query($con, "update  tblsecondadmapplications set status='selected' where id='$cid'");
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
           View Second Application Form
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
$ret=mysqli_query($con,"select * from tblsecondadmapplications where tblsecondadmapplications.id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

<table border="1" class="table table-bordered mg-b-0">
<form name="submit" method="post" enctype="multipart/form-data">

   <tr>
    <th>Course Applied (Second Form)</th>
    <td></td>
  </tr>
  <tr>
    <th>Date Of Breath</th>
    <td><?php  echo $row['dob'];?></td>
    </td>

  </tr>
  <tr>
    <th>Nationality</th>
    <td><?php  echo $row['nationality'];?></td>

  </tr>
  <tr>
    <th>Mother Name</th>
    <td><?php  echo $row['motherName'];?></td>

  </tr>
  <tr>
    <th>place Of Breath</th>
    <td><?php  echo $row['placeOfBreath'];?></td>

  </tr>
  <tr>
    <th>Place He/She Live</th>
    <td><?php  echo $row['placeHeSheLive'];?></td>

  </tr>
  <tr>
    <th>Country</th>
    <td><?php  echo $row['country'];?></td>

  </tr>
  <tr>
  <th>Governate</th>
  <td><?php  echo $row['governate'];?></td>

</tr>

<tr>
    <th>City</th>
    <td><?php  echo $row['city'];?></td>

  </tr>
  
  <tr>
    <th>Village</th>
    <td><?php  echo $row['village'];?></td>

  </tr>
  <tr>
    <th>State</th>
    <td><?php  echo $row['state'];?></td>

  </tr>

  <tr>
    <th>id Card Number</th>
    <td><?php  echo $row['idCardNumber'];?></td>

  </tr>
  <tr>
    <th>nationalty Number</th>
    <td><?php  echo $row['nationaltyNumber'];?></td>

  </tr>
  <tr>
    <th>phone Number First Person</th>
    <td><?php  echo $row['phoneNumberFirstPerson'];?></td>

  </tr>
  <tr>
    <th>Student Place</th>
    <td><?php  echo $row['studentPlace'];?></td>

  </tr>
  <tr>
    <th>religion</th>
    <td><?php  echo $row['religion'];?></td>

  </tr>
  <tr>
    <th>Id card File</th>
    <td><img src="../user/userdocs/<?php echo $row['idCardFile'];?>" width="200" height="150"></td>
  </tr>
  <tr>
    <th>Nationalty Card File</th>
    <td><img src="../user/userdocs/<?php echo $row['nationaltyCardFile'];?>" width="200" height="150"></td>
  </tr>
  <tr>
    <th>Certificate 12 File</th>
    <td><img src="../user/userdocs/<?php echo $row['certificate12File'];?>" width="200" height="150"></td>
  </tr>
  <tr>
    <th>Blood Test File</th>
    <td><img src="../user/userdocs/<?php echo $row['bloodTestFile'];?>" width="200" height="150"></td>
  </tr>
  <tr>
    <th>Eye Test File</th>
    <td><img src="../user/userdocs/<?php echo $row['eyeTestFile'];?>" width="200" height="150"></td>
  </tr>

  <?php if( $row['status'] == 'pending'){?>
  <tr>
    <th>Admin Note</th>
    <td>
      <textarea name="adminNote"><?php  echo $row['adminNote'];?></textarea>
    </td>

  </tr>
  <?php }?>

  <?php if( $row['status'] == 'pending'){?>
  <tr align="center">
    <td colspan="3">
      <button type="submit" name="rejected" value='rejected' class="btn btn-danger">Rejected</button>
      <button type="submit" name="selected" value='selected' class="btn btn-success">Selected</button>

    </td>

  </tr>
  <?php }?>

</form>
</table>

<?php } ?>
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
