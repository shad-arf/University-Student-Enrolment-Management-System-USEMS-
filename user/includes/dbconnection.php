
<?php
/*
$con=mysqli_connect("localhost", "root", "", "last_data");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

 
*/
$servername = "localhost";
$dBUsername = "root";
$dBPwd = "";
$dBName = "student_data";

$con = mysqli_connect($servername , $dBUsername  , $dBPwd , $dBName);

if (!$con){
    die("Connection Timed Out: ".mysqli_connect_error());
}
