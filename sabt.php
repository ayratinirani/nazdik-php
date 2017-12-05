<?php 
session_start();
include_once "db.php";
if(isset($_POST['ok'])){

   $name=$_POST['name'];
   $category=$_POST['cat'];
   $latlng=$_POST['latlon'];
$phone=$_POST['phone'];
   $latlng=str_replace("LatLng(", "", $latlng);
   $latlng=str_replace(")", "", $latlng);
   $latitude=explode(',', $latlng)[0];
   $longitude=explode(',', $latlng)[1];
 // echo $name."   ".$category."   ".$latitude."   ".$longitude;
     
 $stmt = $dbo->prepare("INSERT INTO amaken (name, category, latitude, longitude, phone) 
    VALUES (:name, :category, :latitude, :longitude, :phone)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':latitude', $latitude);
  $stmt->bindParam(':longitude', $longitude);
  $stmt->bindParam(':phone', $phone);
    
    $stmt->execute();

$_SESSION['MESSAGE']="ثبت انجام شد";
header("Location:index.php");

}


 ?>