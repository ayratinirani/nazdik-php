<?php
include_once "db.php";
header("Content-type:application/json");
$sth=$dbo->query(" SELECT distinct category from amaken ");

/* Fetch all of the remaining rows in the result set */
//print("Fetch all of the remaining rows in the result set:\n");
$result=$sth->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>