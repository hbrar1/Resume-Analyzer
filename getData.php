<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
?>
<?php


$tech_ID = intval($_GET['tech_ID']);

$query = "SELECT * FROM skills where techID=$tech_ID";
$result = mysql_query($query);

  echo "<select name='skillID'>";
//$result = mysqli_query($sql);
//echo "<form method='get'>";
while($course = mysql_fetch_array($result))
{
   // echo "<form method='get'>";


  echo "<option  value=".$course['skillID'].">".$course['skillName']."</option>";


  
   
  }  
  
  echo "</select>";
 //echo "</form>";

?> 