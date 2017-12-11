<?php
include_once "db.php";
header("Content-type:application/json");
$category=$_REQUEST['category'];
$slat=doubleval($_REQUEST['latitude']);
$slon=doubleval($_REQUEST['longitude']);
//$dds="SELECT latitude, longitude, id, name, phone,category,(2 * 6371000 * ASIN( sqrt( SIN(6.28319 * (34.092324 - $lat) / 360 / 2) * SIN(6.28319 * (34.092324 - $lat) / 360 / 2) + COS( 6.28319 * 34.092324 / 360 ) * COS( 6.28319 * $lat / 360 ) * SIN(6.28319 * (-118.337122 - longitude) / 360 / 2) * SIN(6.28319 * (-118.337122 - longitude) / 360 / 2))) as mdistance from amaken where `category`=$category ORDER BY mdistance LIMIT 3";
$dsearch="SELECT latitude, longitude, id, name, phone, category ,( 6371000* acos( cos( radians(36.82120) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(54.46213) ) + sin( radians(36.82120) ) * sin(radians(latitude)) ) ) AS distance FROM  amaken where `category`='$category' ORDER BY distance LIMIT 3";
$ssearch=" SELECT * from amaken where `category` = '$category' ";

$dds="SELECT id, name, phone , ( 6371000* acos( cos( radians($slat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($slon) ) + sin( radians($slat) ) * sin(radians(latitude)) ) ) AS distance FROM  amaken where `category`='$category' ORDER BY distance LIMIT 2";/* Fetch all of the remaining rows in the result set */
$sth=$dbo->query($dds);
$data=array();
//print("Fetch all of the remaining rows in the result set:\n");
$result=$sth->fetchAll(PDO::FETCH_ASSOC);
$data['result']=$result;
$data['success']=1;
echo json_encode($result);
?>