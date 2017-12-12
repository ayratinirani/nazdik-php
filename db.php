<?php 
$db_user="root";
$db_pass="";
$db_name="nazdik";
$db_host="localhost";
$db_charset="utf8";
try{
$dbo=new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset",$db_user,$db_pass);
 $dbo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){

	echo $e->getMessage();
}

 ?>