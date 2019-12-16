<?PHP
session_start();
include_once("connection/cl_db.php");
global $db; // controller k ander b ye variable pass karana ha Global db wala..........
$db = new DB;
$db->open();
if(!isset($_SESSION['a_username']) or $_SESSION['a_username']=="")
{
	echo "<script> window.location = 'login.php' </script>  ";
	exit;
}
?>

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/main.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/responsive.css" type="text/css" rel="stylesheet" media="all" />
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script language="javascript">
$(document).ready(function()
{



	
});
</script>


</head>
	
<body onLoad="startBlink()">

<!--whole-body-->



<?php
		include("headerlogin.php");
		include("config.php");
      	
		//$AllData = $db->getExams_ByStudentID($_SESSION['StudentID']);
	
?>
	   	 
		
?>

<div id="main-wrapper">

<div id="top_content_box">
  <div id="top_content_inner">
    <div id="inner_left">
    
	<Table>
	
	<tr>
	<td>Student Name</td><td> Exams </td></tr>
	<?PHP
	//foreach($allStudents as $Student)
	//{
	//	echo "<tr><td>";
	//	$Student->enrollNumber;
	//	echo "</td></tr>";
	
	?>	
	
	</Table>
  
 
 </div>
	 
    <div id="inner_right">

      <h1 style="margin-bottom:10px;" class="box_heding">Attention Note !</h1>

		<p style="padding-left:10px; ">
		
		<b style="color:Green;">Change Your <b>Password</b><br />
		
				Old Password <input type="text"/>
				New Password <input type="text"/>
				Confirm Password <input type="text"/>
				
 </p>
	

	
    </div>
    <div class="clear-me"></div>
	
  </div>


</div>
			

 <br />
 <?PHP
 include("footer.php");
 ?>	
 	 <div class="clear-me"></div>	
</div>
 

  </body>
  </html>
