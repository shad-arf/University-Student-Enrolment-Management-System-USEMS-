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
$ret=mysqli_query($con,"SELECT * from student_data where Code='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>    

<?php


$ret2=mysqli_query($con,"SELECT * from tbladmapplications where userId='$sid'");
$cnt=1;
while ($row2=mysqli_fetch_array($ret2)) {

?>
    

<main id="main" class="output">
  <div class="ac-card">
    <img src="../user/userimages/<?php echo $row2['image'];?>" class="ac-card-image">

    <div class="ac-card-info">
      <p>
         <span style="font-weight: 500;" id="name">Name : <?php  echo $row['firstName'];?> &nbsp; <?php  echo $row['lastName'];?></span><br>
         <span id="studentNumber">Phone :<?php  echo $row['phoneNumber'];?></span>
         <br>

         <?php 
         // get faculty name from tblfaculty table where facultyid is equal to facultyid from tbladmapplications table
            $facultyid = $row2['facultyId'];
            $ret3=mysqli_query($con,"select * from tblfaculty where ID='$facultyid'");
            $cnt=1;
            while ($row3=mysqli_fetch_array($ret3)) {
         ?>
         <span id="studentNumber">faculty : <?php  echo $row3['name'];?></span>

            <?php } ?>
            <br>
            <span style="font-size: 15px;" id="studentNumber">Email:<?php  echo $row['Email'];?></span>

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

<?php }} ?>

</body>
<script>
    window.print();
    // show the color from print preview
    
</script>
</html>

<?php } ?>