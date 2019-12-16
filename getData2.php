<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
?>
<?php


$tech_ID = intval($_GET['tech_ID']);




//echo "<form method='get'  name='myframe' action='addmark.php'>";

//$var=$_SESSION['sess_username'];
//$Batch=$_SESSION['BatchNo'];

$query = "SELECT * FROM skills where techID=$tech_ID";
$result = mysql_query($query);
						
						


//$result = mysqli_query($sql);
//echo "<form method='get'>";
while($course = mysql_fetch_array($result))
{
   // echo "<form method='get'>";
//  echo "<div style='float:left;width:100px; padding-left:10px'>";

echo "<input type='CheckBox' name='skillSet[]' id=".$course['skillID']." value=".$course['skillID'].">".$course['skillName']."</input>";
 
	//echo "</div>";
  
   
  }  
 //echo "</form>";

?> 