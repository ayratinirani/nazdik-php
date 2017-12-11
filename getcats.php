<?php
include_once "db.php";
header("Content-type:application/json");
$sth=$dbo->query(" SELECT distinct category from amaken ");

$data=array();
/* Fetch all of the remaining rows in the result set */
//print("Fetch all of the remaining rows in the result set:\n");
$result=$sth->fetchAll(PDO::FETCH_ASSOC);
$data['result']=$result;
$data['success']=1;
echo json_encode($result);
?>