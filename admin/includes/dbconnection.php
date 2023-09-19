<?php 

$servername = "localhost";
$dBUsername = "root";
$dBPwd = "";
$dBName = "student_data";

$con = mysqli_connect($servername , $dBUsername  , $dBPwd , $dBName);

if (!$con){
    die("Connection Timed Out: ".mysqli_connect_error());
}
