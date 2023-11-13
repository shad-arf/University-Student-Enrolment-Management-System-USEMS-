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

  <title>College Addmission Management System|| View Form</title>
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

  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
         
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
              
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
$ret=mysqli_query($con,"SELECT
 tbladmapplications.*,tblfaculty.*,tbluser.*,tblsecondadmapplications.*
  from  tbladmapplications inner join tbluser on tbluser.id=tbladmapplications.userId  
  inner join tblfaculty on tbladmapplications.facultyId=tblfaculty.id 
  inner join tblsecondadmapplications on tblsecondadmapplications.userId=tbladmapplications.userId
   where tbladmapplications.id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
// var_dump($row);
?>
<!-- <div align="right"> </div>
<div align="right"> <?php echo $row['firstName'].' '.$row['secondName'].' '.$row['lastName']  ?>  ناوی قوتابی  </div>
<div align="right">ناوی قوتابی: <?php echo $row['kuFirstName'].' '.$row['kuSecondName'].' '.$row['kuLastName']  ?>    </div>
<div align="right"> <?php echo $row['motherName']  ?>  ناوی دایک  </div>

<div align="right"> ژمارەی ناسنامەی قوتابی  <?php echo $row['idCardNumber']  ?></div>
<div align="right"> <?php echo $row['gender']  ?>  ڕەگەز </div>
<div align="right"> <?php echo $row['studentPlace']  ?>  جۆری دەرماڵە </div>
<div align="right"> جۆری بڕوانامە</div>
<div align="right"> <?php echo $row['placeOfBreath']  ?>   شوێنی لەدایک بوون </div>
<div align="right"> <?php echo $row['dob']  ?>   بەرواری لەدایک بوون </div>
<div align="right"> <?php echo $row['nationality']  ?>     نەتەوە </div>
<div align="right"> <?php echo $row['religion']  ?>     ئاین </div>
<div align="right"> <?php echo $row['MobileNumber']  ?>     ژ تەلەفون </div>
<div align="right"> <?php echo $row['phoneNumberFirstPerson']  ?>     ژ تەلەفونی کەسی نزیک </div>
<div align="right"> <?php echo $row['placeHeSheLive']  ?>   شوێنی نیشتەجێ بوون </div>
<div align="right"> <?php echo $row['country']  ?>   وڵات   </div>
<div align="right"> <?php echo $row['governate']  ?>   پارێزگا   </div>
<div align="right"> <?php echo $row['village']  ?>   گوند   </div>
<div align="right"> <?php echo $row['state']  ?>   گەڕەک   </div>
<div align="right"> <?php echo $row['nationaltyNumber']  ?>   ژ ڕەگەزنامەی ئێراقی   </div> -->
<pre align="right">
  ناو و نازناوی قوتابی : <?php echo $row['kuFirstName'].' '.$row['kuSecondName'].' '.$row['kuLastName']  ?>


  ژمارەی نازنامەی قوتابی      <?php echo $row['idCardNumber']  ?>          ڕەگەز   <?php echo $row['gender']  ?>


  جۆری دەرماڵە <?php echo $row['studentPlace']  ?>

  جۆری بڕوانامە  ئامادەی    یەکەمەکانی پەیمانگا     خ.ئیسلامی       بیانی


  شوێن و مێژوی لەدایک بوون  <?php echo $row['dob'].' / '.$row['placeOfBreath']  ?>     جۆری خوێن  
  
  
  نەتەوە  <?php echo $row['nationality']  ?>    ئایین  <?php echo $row['religion']  ?>  ژ.تەلەفون  <?php echo $row['MobileNumber']  ?>   ژ.ت نزیکترین کەس  <?php echo $row['phoneNumberFirstPerson']  ?>


   شوێنی نیشتەجێ بوون <?php echo $row['placeHeSheLive']  ?>  پارێزگا  <?php echo $row['governate']  ?>      گەڕەک  <?php echo $row['state']  ?>    گوند <?php echo $row['village']  ?>    ژ.خانوو 
  
   ژمارەی ڕەگەزنامەی ئێراقی    <?php echo $row['nationaltyNumber']  ?>         مێژوو .............. زمارەی فایل 
  
   ژن نیشتمانی              مێژووو............ ب.  ................  دۆسیە ........  پەڕاو
 
   ژ.کارتی نیشتمانی     

</pre>
<!-- 
<pre align="right">
  ناو و نازناوی قوتابی : کاوان
  ژمارەی نازنامەی قوتابی                ڕەگەز   نێر
  جۆری دەرماڵە ماڵەوە
  جۆری بڕوانامە  ئامادەی    یەکەمەکانی پەیمانگا     خ.ئیسلامی       بیانی
  شوێن و مێژوی لەدایک بوون  دساداس    جۆری خوێن     
  نەتەوە      ئایین    ژ.تەلەفون     ژ.ت نزیکترین کەس  دساداس
  شوێنی نیشتەجێ بوون   پارێزگا        گەڕەک      گوند     ژ.خانوو
  ژمارەی ڕەگەزنامەی ئێراقی             مێژوو .............. زمارەی فایل 
  ژن نیشتمانی              مێژووو............ ب.  ................  دۆسیە ........  پەڕاو
  ژ.کاتی نیشتمانی     

</pre> -->
<div align="center">سەربوردەی قوتابی</div>
<table border="1" class="table table-bordered mg-b-0">

   <tr>
    <td>تێبینی</td>
    <td>ئەنجام</td>
    <td>پۆل</td>
    <td>ساڵی خوێندن</td>
    <th>ژ</th>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>١</th>

  </tr>

  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>٢</th>

  </tr>
  
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>٣</th>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>٤</th>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>٥</th>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>٦</th>

  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <th>٧</th>

  </tr>
</table>
<center>
idCardFile<br>
  <img  src="../user/userdocs/<?php echo $row['idCardFile'];?>" width="400" height="300"><br>
  nationaltyCardFile<br>
  <img  src="../user/userdocs/<?php echo $row['nationaltyCardFile'];?>" width="400" height="300"><br>
  certificate12File<br>
  <img  src="../user/userdocs/<?php echo $row['certificate12File'];?>" width="400" height="300"><br>
  bloodTestFile<br>
  <img  src="../user/userdocs/<?php echo $row['bloodTestFile'];?>" width="400" height="300"><br>
  eyeTestFile<br>
  <img  src="../user/userdocs/<?php echo $row['eyeTestFile'];?>" width="400" height="300"><br>
</center>

<?php } ?>

      
        


            





<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
</div>
</div>



 </div>
                </div>
              </div>
            
     

<?php include('includes/footer.php');?>


  <script>
    // on this page load print the page
    window.print();
    
  </script>
        <?php include('includes/footerjs.php'); ?>

</body>
</html>
<?php  } ?>
