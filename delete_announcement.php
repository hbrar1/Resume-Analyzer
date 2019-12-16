<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
$id=$_GET['pid'];
$query = "delete  FROM jobs WHERE PositionID= '$id' ";
echo $query;
$result = mysql_query($query);

$query = "delete  FROM  positionannouncement WHERE positionannouncementid= '$id' ";
echo $query;
$result = mysql_query($query);
header('Location:positionAnnoucement.php');
		


?>