<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();



$user_email=htmlspecialchars($_POST['email'],ENT_QUOTES);
$pass = htmlspecialchars($_POST['password'],ENT_QUOTES);
//$pass=($_POST['password']);


echo $user."asdfasdf";
//now validating the username and password

/*$sql="SELECT email, password FROM candidate WHERE a_username='".$user_email."' and a_active=1";*/

$sql="SELECT * FROM candidate ";


$result=mysql_query($sql);
$row=mysql_fetch_array($result);

//if username exists
if(mysql_num_rows($result)>0)
{
	//compare the password
		echo "yes";
		//now set the session from here if needed
		
		
		
		
		
	
	
	
}
else
	echo "no"; //Invalid Login


?>