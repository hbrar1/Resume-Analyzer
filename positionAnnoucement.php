<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
if(!isset($_SESSION["id"]))
	{
		header('Location:company_login.php');
		exit;		
	}

		$id=$_SESSION['id'];
		//echo $id;
		if (isset($_POST["positiontitle"]) && !empty($_POST["positiontitle"]) && isset($_POST["description"]) && !empty($_POST["description"]) )
		{
			
	
				$positiontitle= $_POST['positiontitle'];  
				$description = $_POST['description'];   
				$experiencerequired= $_POST['experiencerequired'];
				$numberofvacancies= $_POST['numberofvacancies'];   
				$skillsrequired= "";
				$certificationrequired= $_POST['certificationrequired'];
				$qualificationrequired= $_POST['qualificationrequired'];
				$districtdomicile= $_POST['districtdomicile'];   
				$gender= $_POST['gender'];
				$preferences= $_POST['preferences'];
				$nationality= $_POST['nationality'];
				$dateofposting= $_POST['dateofposting'];   
				$closingdate= $_POST['closingdate'];
	
	
			if ($_FILES["file"]["error"] > 0)
				{
				//echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
				}
			  else
				{
				//echo "Upload: " . $_FILES["file"]["name"] . "<br>";
				//echo "Type: " . $_FILES["file"]["type"] . "<br>";
				//echo "Size: " . ($_FILES["file"]["size"] / 9024) . " kB<br>";
				//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

				if (file_exists("cupload/" . $_FILES["file"]["name"]))
				  {
				  //echo $_FILES["file"]["name"] . " already exists. ";
				  }
				else
				  {
				  move_uploaded_file($_FILES["file"]["tmp_name"],
				  "cupload/" . $_FILES["file"]["name"]);
				  }
				}
			$filepath=$_FILES["file"]["name"];



$sql="INSERT INTO `positionannouncement`(`positiontitle`, `description`, `adverticement`, `experiencerequired`, `numberofvacancies`, `skillsrequired`, `certificationrequired`, `QID`, `districtdomicile`, `gender`, `preferences`, `nationality`, `dateofposting`, `closingdate`, `companyid`) VALUES ('$positiontitle','$description','$filepath','$experiencerequired','$numberofvacancies','$skillsrequired','$certificationrequired','$qualificationrequired','$districtdomicile','$gender','$preferences','$nationality','$dateofposting','$closingdate','$id')";
  // echo $sql;
if (mysql_query($sql)) {
$Pos = mysql_insert_id();
if(!empty($_POST['skillSet']))
{
// Loop to store and display values of individual checked checkbox.
foreach($_POST['skillSet'] as $selected)
{
$PosiDetailQuery =  "insert into PositionDetails(PositionID,SkillID)value($Pos,$selected)";
 mysql_query($PosiDetailQuery);

}

}
}
else{
	echo "eror";
}
}
	


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Resume Analyzer</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-900.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	
	
  }
  }
 
xmlhttp.open("GET","getData2.php?tech_ID="+str,true);
xmlhttp.send();
}



</script>


</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1><a href="index.html">Resume Analyzer</a></h1>
      </div>
      <div class="searchform">
        <form id="formsearch" name="formsearch" method="post" action="#">
          <span>
          <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
          </span>
          <input name="button_search" src="images/search.gif" class="button_search" type="image" />
        </form>
      </div>
      <div class="clr"></div>
      <div id="menu" class="menu_nav">
	<ul>
          <li class="active"><a href="index.php"><span>Home</span></a></li>
                  
         <li>
		 <a href="Register.php" style="padding:15px 15px;">Register
			<img src="images/images.png" style="width: 21px; padding-right:50px;" />
			<?php

				$Mysql=mysql_query("select * FROM candidate");
				$Regcomment_count=mysql_num_rows($Mysql);
				if($Regcomment_count!=0)
				{
				echo '<span id="mes1">'.$Regcomment_count.'</span>';
				}
			?>
			</a>
		 </li>
		 
		 <?PHP 
		if(isset($_SESSION["id"]))
		{ 
		?>
			<li><a href="company_panel.php"><span>My Account</span></a>
			<span style="color:white">Welcome : <?PHP echo $_SESSION["companyname"]; ?></span>  
			</li>
		
		<?PHP 
		
		}
		else
		{ 
		 ?>
		 <li><a href="company_login.php"><span>Login</span></a></li>		 
		
		<?PHP 
		 }
		 ?>
         
		  <li><a href="contact.php"><span>Contact Us</span></a></li>	
		
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="935" height="307" alt="" /> </a> 
		 </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article" >
			 	 <form action="" method="post"
enctype="multipart/form-data">
				<table>
				<caption><h1><span>Jobs Announcement</span></h1></caption>
				
				<tr>
					<td>Job Title  </td>
				
					
				<td><input type="text" class="text" name="positiontitle" > </td>
					
				</tr>

<tr>
					<td> Qualification Required</td>
					<td> 
					 
							<select name="qualificationrequired"  class="text" required>
							
							echo "<option value="">Choose Qualification</option>";
				<?php
				$query = "SELECT * FROM  qualification "; 
				$result = mysql_query($query); 
				while($row = mysql_fetch_array($result))
				{

					echo "<option value=".$row['0'].">".$row['1']."</option>";
				}
						
					
				?>		
					</select>
					</td>
					
				</tr>

<tr>
					<td> Skills Required</td>
					<td> 
						
				<select name="users" id="users" onchange="showUser(this.value)"   class="text"  required>
				echo "<option value="">Choose Technology</option>";
				<?php
				$query = "SELECT * FROM  technology "; 
				$result = mysql_query($query); 
				while($row = mysql_fetch_array($result))
				{

					echo "<option value=".$row['0'].">".$row['1']."</option>";
				}
						
					
				?>		
						</select>


		<div id="txtHint" style="float:left;"> 
		
		</div>				 
							 

	</td>
				
				</tr>				
				<tr>
					<td> Preferences :&nbsp;</td>
					<td> <input type="text" class="text" name="preferences" > 
						</td>
				</tr>
			
	
		
	

				<tr>
					<td> Description  </td>
					<td> 
						<textarea class="text" rows="5" type="text" name="description" > </textarea>
						
					</td>
				</tr>
				<tr>
					<td> Experience Required (Years)  </td>
					<td> 
						<input type="text" class="text" name="experiencerequired" > 
						
					</td>
				</tr>
				<tr>
					<td> Advertisement  </td>
					<td> 
						<input type="file" class="text" name="file" id="file" >
					
					</td>
				</tr>
							
<tr>
					<td>Number of Vacancies</td>
					<td> 
						<input type="text" class="text" name="numberofvacancies">
					</td>
				</tr>
				
				<tr>
					<td> Certification Required</td>
					<td> 
						<input type="text" class="text" name="certificationrequired"   >
					</td>
				</tr>
				<tr style="display:none">
					<td> District Domicile</td>
					<td> 
						<input type="text" class="text"  value="domicile" name="districtdomicile">
					</td>
			
				
				
				<tr>
					<td>Nationality  </td>
					<td>
						<select name="nationality"  class="text"  required>
						<option value="1">Select Country</option>
						        <option value="United States">United States </option>
								<option value="Pakistan">Pakistan </option>
								<option value="India">India </option>
								<option value="Srilanka">Srilanka </option>
								<option value="Bangladesh">Bangladesh </option>
					
								
						</select>
					</td>
				</tr>
				<tr>
					<td> Date of Posting</td>
					<td> 
						<input type="date" class="text" name="dateofposting"     >
					</td>
				</tr><tr>
					<td> Closing Date</td>
					<td> 
						<input type="date" class="text" name="closingdate"   >
					</td>
				</tr>
			
			
				
				
				<tr>
					<td> Company Description  </td>
					<td>
						<input type="text" class="text" name="companydescription" required > 
						
					</td>
				</tr>
				<tr>
					<td>Company Contact </td>
					<td><input type="text" class="text" name="companycontact" required > 
					</td>
				</tr>
		
				<tr>
					<td>Company Address</td>
					<td><input type="text" class="text" name="companyaddress" required> 
					</td>
					</tr>
				
				<tr>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td><input type="Submit" class="btnSubmit" name="Submit" value="Post The Job"/> </td>
				</tr>
			</table>
			</form>
          <div class="clr"></div>
        </div>
        <div class="article" style="overflow:scroll; width:800px;" >
        
		<table name="files">
					<tr>

						<th>Title</th>
						<th>Desc</th>
						<th>Advertizement</th>
						<th>Experience</th>
						<th>Vacancies </th>
						<th>Skills</th>
						<th>Certification</th>
						<th>Preferences </th>
						<th>Nationality</th>	
						<th>Posting_Date </th>
						<th>Closing_Date</th>
						<th>Delete</th>
										
					</tr>
		<?php
		
		
		
    $query = "SELECT * FROM `positionannouncement` WHERE companyid=". $_SESSION['id'];
//echo $query;
    $result = mysql_query($query);     	
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['1']."</td>";
	echo "<td>".$row['2']."</td>";
	echo "<td><a href=cupload/".$row['3']."><img src='cupload/".$row['3']."' width='40px' height='40px'></td>";
	echo "<td>".$row['4']."</td>";
	
	echo "<td>".$row['5']."</td>";
	echo "<td>".$row['6']."</td>";
	echo "<td>".$row['7']."</td>";
	
	echo "<td>".$row['10']."</td>";
	echo "<td>".$row['11']."</td>";
    echo "<td>".$row['12']."</td>";
	echo "<td>".$row['13']."</td>"; 
	echo "<td>".$row['14']."</td>";
	echo "<td><a href=delete_announcement.php?pid=".$row['0']." >Delete</a></td>";
	 echo "</tr>";

}
		
		
		
		?>
		
		</table>
		
        </div>

      </div>
      <div class="sidebar">
        <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		  <?php if(isset($_SESSION["id"]))
		{
		?>
		      <li><a href="company_panel.php">Company DashBoard</a></li>
		    <li><a href="cjobs.php">Jobs</a></li>
            <li><a href="company.php">Company Profile</a></li>
            <li><a href="positionAnnoucement.php.">Jobs Announcement</a></li>
						<li><a href="logout.php?ID=2">Logout</a></li>
			<?php
		}
		?>
          </ul>
        </div>
		
      </div>
      <div class="clr"></div>
    </div>
  </div>
<?php include('footer.php') ?>
</div>
</body>
</html>
