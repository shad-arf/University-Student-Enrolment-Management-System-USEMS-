<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['uid'])==0){
header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <title>Soran University Admission Management System | Dashboard</title>
 
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
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->

   <?php include_once('includes/header.php');?>
 <?php include_once('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- Revenue, Hit Rate & Deals -->
   <?php 
                $uid=$_SESSION['uid'];
                $ret=mysqli_query($con,"SELECT Code FROM student_data where Code='$uid'");
                $row=mysqli_fetch_array($ret);
                $rtp =mysqli_query($con ,"SELECT * from tbladmapplications where userId='$uid'");

                $row=mysqli_fetch_array($rtp);
                $adsts=$row['status'];
                if($row>0){
?>

        <div class="row" >
          <div class="col-xl-10 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <a href="addmission-form.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                  


                  <?php 
                  if($adsts=="selected") {?>
                      <h4 align="center">داواکارییەکەت وەرگیرا</h4>
                      
                    <?php } ?>

                    <?php if($adsts=="rejected") {?>
                      <div class="row">
                        <p style="font-size:16px; color:red" align="center"><?php echo $row['adminNote'] ?></p>

                        </div>

                      <h4 align="center">داواکارییەکەت هەلوەشایەوە </h4>
                      
                    <?php } ?>
                  <?php if($adsts=="pending") {?>
                      <h4 align="center">داواکارییەکەت لە چاوەروانی دایە لەلایەن ئەدمینانی زانکۆی سۆران </h4>
                    <?php } ?>
                    </div>
                    <div>
         <i class="icon-file success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">

                    <?php if($adsts=="pending") {?>
                    <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div> <?php } ?>
                          <?php if($adsts=="rejected") {?>
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div> <?php } ?>
                  <?php if($adsts=="selected") {?>
                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div> <?php } ?>

                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
        </div>
<?php 
}else{?>
     
        <div class="row" >
          <div class="col-xl-10 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <a href="addmission-form.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h4 align="center">تۆ داواکاری خۆتۆمارکردنت بۆ زانکۆی سۆران نەناردووە تکایە فۆرمی خۆ تۆمارکردن پڕبکەرەوە </h4>
                    </div>
                    <div>
         <i class="icon-file success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 100%"
                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div> 
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>
        
    <?php if($adsts=="selected"  ) {?>
     
     <div class="row" >
              <div class="col-xl-10 col-lg-6 col-12">
                <div class="card pull-up">
                  <div class="card-content">
                       <a href="upload-doc.php">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
    
                          <h4 align="center">داواکارییەکەت وەرگیرا تکایە دۆکیومێنەتەکانت بنێرە </h4>
                      
    
                        </div>
                        <div>
             <i class="icon-file success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
    
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div></div>
            <?php } ?>

<?php 
$uid=$_SESSION['uid'];
$rtp =mysqli_query($con ,"SELECT status from tblsecondadmapplications where userId='$uid'");
$row=mysqli_fetch_array($rtp);
$adsts=$row['status'];
if($adsts=="selected"  )
{ ?>

        <div class="row" >
          <div class="col-xl-10 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                   <a href="addmission-form.php">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">




                      <h4 align="center">دووەم داواکاریت وەرگیرا دەتوانیت داواکاریەکەت پرێنت بکەیت </h4>
                  

                    </div>
                    <div>
         <i class="icon-file success font-large-2 float-right"></i>
                    </div>
                  </div>
                  <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
        </div>
         <?php }
        }
        $rtp =mysqli_query($con ,"SELECT * from tblnotice");
        
        while ($row = mysqli_fetch_array($rtp)) {
          $text = $row['Title'] . $row['Decription']; // Combine title and description for inspection

          // Determine the text direction (RTL for Arabic, LTR for others)
          $textDirection = preg_match('/\p{Arabic}/u', $text) ? 'rtl' : 'ltr';
      
          // Start the HTML block with the determined text direction
          echo '<div style="direction: ' . $textDirection . ';">';
      
          echo '<h2 style="color: #000">' . $row['Title'] . '</h2>';
          $noticeDate = date('F j, Y', strtotime($row['CreationDate'])); // Format the date as desired
          echo '<p style="font-size: 12px;color: #666;margin-top: 5px;"> ' . $noticeDate . '</p>';
          echo '<p style="color: #111;">' . $row['Decription'] . '</p>';
      
          // Close the HTML block
          echo '</div>';
  
          // Display the date
        
      }
?>  
     
        </div>
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
