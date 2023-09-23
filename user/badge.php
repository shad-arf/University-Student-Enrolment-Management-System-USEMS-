<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .output {
  justify-content: center;
  align-content: start;
  padding-top: 1rem;
}

.ac-card {
  display: grid;
  grid-template-columns: 173px 1fr 50px;
  background-color: #fff;
  width: 412.5px;
  height: 250px;
  margin-bottom: 1rem;
  
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 5px rgba(0,0,0, 0.5);
}

.ac-icon {
  width: 40px;
  margin-top: 10px;
}

.ac-card-image {
  height: 168px;
  width: 131px;
  margin: 10px 0 0 15px;
  border: 3px solid #006341;
  object-fit: cover;
}

.ac-card-info {
  font-size: 1.15rem;
  margin: 0;
}

.ac-card-info p {
  margin-top: 8px;
  line-height: 1.3;
}

.ac-card-footer {
  display: grid;
  align-content: center;
  grid-column: 1/-1;
  align-self: end;
  height: 56.5px;
  background-color: blue; 
}

.ac-logo {
  width: 125px;
  margin-left: 10px;
}

.hide {
  opacity: 0;
  visibility: hidden;
}
    </style>
</head>
<body>

<?php
$sid=$_GET['udid'];



$ret2=mysqli_query($con,"SELECT * from tbladmapplications where userId='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret2)) {
?>
    

<main id="main" class="output">
  <div class="ac-card">
    <img src="../user/userimages/<?php echo $row['image'];?>" class="ac-card-image">
    <div class="ac-card-info">
      
      <p>
         <span style="font-weight: 500;" id="name">Name : <?php  echo $row['firstName'];?> &nbsp; <?php  echo $row['secondName'];?>&nbsp; <?php  echo $row['lastName'];?></span><br>
         <span id="studentNumber">Phone :<?php  echo $row['kuSecondName'];?></span>
         <br>

         <?php 
         // get faculty name from tblfaculty table where facultyid is equal to facultyid from tbladmapplications table
            
          ?>
         <span id="studentNumber">faculty : <?php  echo $row['facultyId'];?></span>

            <br>
            <span style="font-size: 15px;" id="studentNumber">Department:<?php  echo $row['departmentId'];?></span>

      </p>
      <p id="partTime" class="hide">PART TIME</p>
      <p id="date" class="ac-card-date"></p>
    </div>
    <div class="ac-card-footer">
        <p style="margin-left: 20px;font-size:20px;color:white">
        Soran Univesity

        </p>
    </div>
  </img>
</main>

<?php }?>

</body>
<script>
    window.print();
    // show the color from print preview
    
</script>
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
</html>

<?php } ?>