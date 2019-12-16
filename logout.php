<?php
session_start();
session_unset(); 

session_destroy(); 
$myID = 0;

if(isset($_GET["ID"]))
	$myID = $_GET["ID"];


header('location:candidate_login.php');

?>