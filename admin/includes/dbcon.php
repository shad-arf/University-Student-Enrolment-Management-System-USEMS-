<?php
$host='localhost';
$db='student_data';
try{
$pdo= new PDO("mysql: host=$host;dbname=last_data", 'root', '');
//Echo 'connected';
}
catch (PDOException $e){
  echo "not connected ".$e->getMessage();
    die();
}
//$pdo= null;
?>

 

