<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
if(!isset($_SESSION["email"]))
	{
		header('Location:candidate_login.php');
		exit;		
	}
//echo $_POST['level'];
							//$level = $_SESSION['level'];
							$candidateemail=$_SESSION['email'];
							$_SESSION['degreename']="";
							$_SESSION['dateofadmission']="";
							$_SESSION['dateofpassing']="";
							$_SESSION['percentate']="";
							$_SESSION['division']="";
							$_SESSION['specialization']="";
							
						
	
	if( isset( $_GET['uid'] ))
				{
						$uid=$_GET['uid'];
						$query = "SELECT * FROM candidateeducation 
INNER JOIN qualification ON qualification.QID =candidateeducation.QID where candidateeducationid=$uid ";
						echo $query;
						$result = mysql_query($query);
						
						while($row = mysql_fetch_array($result))
						{
							 $_SESSION['candidateeducationid']=$row['candidateeducationid'];
							 $_SESSION['test']=$row['candidateemail'];
							 $dateofadmission= $row['dateofadmission'];  
														 
							 $dateofpassing= $row['dateofpassing'];
							 $percentate= $row['percentate'];   
							 $division= $row['division'];
							 $specialization= $row['specialization'];
							 $level= $row['TechID']; 
							$degreename= $row['QID'];  
							
							
						}
						
							$_SESSION['degreename']=$degreename;
							$_SESSION['dateofadmission']=$dateofadmission;
							$_SESSION['dateofpassing']=$dateofpassing;
							$_SESSION['percentate']=$percentate;
							$_SESSION['division']=$division;
							$_SESSION['specialization']=$specialization;
							$_SESSION['level']=$level;
				}	
		if (isset( $_POST['Insert']) && !isset($_SESSION['test']))
			{ 		
					
					if (isset($_POST["degreename"]) && !empty($_POST["degreename"]) && isset($_POST["dateofadmission"]) && !empty($_POST["dateofadmission"]) )
					{
							if(isset($_SESSION['candidateeducationid']))
							   $candidateeducationid = $_SESSION['candidateeducationid'];
						   
							$degreename = $_POST['degreename'];   
							$dateofadmission= $_POST['dateofadmission'];
							$dateofpassing= $_POST['dateofpassing'];   
							$percentate= $_POST['percentate'];
							$division= $_POST['division'];
							$specialization= $_POST['specialization'];  
							$level= $_POST['level']; 
							$TechID = $_POST['Level']; 	 							
							
							$email=	$_SESSION["email"];
						 
							$_SESSION['degreename']=$degreename;
							$_SESSION["level"]=$level;
							$_POST['Level']= $TechID;	
							$_SESSION['dateofadmission']=$dateofadmission;
							$_SESSION['dateofpassing']=$dateofpassing;
							$_SESSION['percentate']=$percentate;
							$_SESSION['division']=$division;
							$_SESSION['specialization']=$specialization;
							
							$sql="INSERT INTO `candidateeducation`(`candidateemail`, `QID`, `dateofadmission`, `dateofpassing`, `percentate`, `division`, `specialization`,`TechID`) VALUES ('$candidateemail',$degreename,'$dateofadmission','$dateofpassing',' $percentate','$division','$specialization','$TechID')";
							//echo $sql;

							if (!mysql_query($sql)) {
							  echo "eror education";
							}
							else
							{
								
									$_SESSION['degreename']="";
									$_SESSION['$level'] = "";
									$_SESSION['dateofadmission']="";
									$_SESSION['dateofpassing']="";
									$_SESSION['percentate']="";
									$_SESSION['division']="";
									$_SESSION['specialization']="";
							}
	

}
	
	}
	else
	{

			if (isset($_POST["degreename"]) && !empty($_POST["degreename"]) && isset($_POST["dateofadmission"]) && !empty($_POST["dateofadmission"]) )
			{

					$candidateeducationid=$_SESSION['candidateeducationid'];
				    $degreename = $_POST['degreename']; 
					$TechID = $_POST['Level']; 					
				    $dateofadmission= $_POST['dateofadmission'];
				    $dateofpassing= $_POST['dateofpassing'];   
				    $percentate= $_POST['percentate'];
					$division= $_POST['division'];
				    $specialization= $_POST['specialization'];   
					$email=$_SESSION['email'];
					//$level= $_POST['level'];

		$sql = "UPDATE candidateeducation SET candidateemail='$email' ,QID=$degreename,dateofadmission='$dateofadmission',dateofpassing='$dateofpassing',percentate='$percentate',division='$division',specialization='$specialization',TechID=$TechID where candidateeducationid=$candidateeducationid";
   
if (!mysql_query($sql)) {
  echo "eror";
}
else
{
	$_SESSION['degreename']=$degreename;
	$_SESSION['level']=$TechID;
	$_SESSION['dateofadmission']=$dateofadmission;
	$_SESSION['dateofpassing']=$dateofpassing;
	$_SESSION['percentate']=$percentate;
	$_SESSION['division']=$division;
	$_SESSION['specialization']=$specialization;
	
	
	unset($_SESSION['test']);
	header('Location:education.php');
}
}	
		
	}
	
	
		if( isset( $_GET['did'] ))
	{
			$did=$_GET['did'];
			$query = "delete FROM candidateeducation where candidateeducationid=$did ";
			//echo $query;
			if (!mysql_query($query)) {
			echo "error delete";
			}
			else
			{	
		
				
			}
	
	}
	
	
//echo $level;
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

<style>
th {
  text-align: left;
  color: white;
  background-color: rgba(217, 133, 59, 0.97);
font-size: 0.75em;
}
</style>
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
	  <?php 
	    if(isset($_SESSION["email"])){
		?>
			<span style="color:white"> <h2 align="right" style="color:black">Welcome : <?PHP echo $_SESSION["firstname"] ?></h2></span>
		<?php	
    }
	   ?>
     <div id="menu" class="menu_nav">
	<ul>
          <li class="active"><a href="index.php"><span>Home</span></a></li>
          

		  <li>
			<a href="jobs.php" style="padding:10px 0;">Jobs
			<img src="images/images.png" style="width: 21px;" />
			<?php

				$sql=mysql_query("select * FROM positionannouncement");
				$comment_count=mysql_num_rows($sql);
				if($comment_count!=0)
				{
				echo '<span id="mes">'.$comment_count.'</span>';
				}
			?>
			</a>
			<ul class="sub-menu">
		
			<?php
			
			$msql=mysql_query("select * from positionannouncement order by positionannouncementid desc");
			while($messagecount=mysql_fetch_array($msql))
			$id=$messagecount['positionannouncementid'];
			$msgcontent=$messagecount['positiontitle'];
			?>
			<li class="egg">
			<div class="toppointer"><img src="images/top.png" /></div>
				<?php 

				$sql=mysql_query("select * from positionannouncement order by positionannouncementid");
				$comment_count=mysql_num_rows($sql);

				if($comment_count>2)
				{
				$second_count=$comment_count-2;
				} 
				else 
				{
				$second_count=0;
				}
				?>

				<div id="view_comments<?php echo $id; ?>"></div>

				<div id="two_comments<?php echo $id; ?>">
				<?php
				$listsql=mysql_query("select * from positionannouncement");
				while($rowsmall=mysql_fetch_array($listsql))
				{ 
				$c_id=$rowsmall['positionannouncementid'];
				$comment=$rowsmall['positiontitle'];
				?>

				<div class="comment_ui">

				<div class="comment_text">
				<div  class="comment_actual_text"><a href="jobdetails.php?id=<?php echo $rowsmall['positionannouncementid']?>" > <?php echo $comment; ?>
				</a></div>
				</div>

				</div>
				
				<?php }?>
				<div class="bbbbbbb" id="view<?php echo $id; ?>">
					<div style="background-color: #F7F7F7; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px; position: relative; z-index: 100; padding:8px; cursor:pointer;">
					<a href="jobs.php" class="view_comments" id="<?php echo $id; ?>">View all <?php echo $comment_count; ?> Jobs</a>
					</div>
				</div>
			</li>
		</ul>
		</li>
          
        <?PHP 
		if(isset($_SESSION["email"]))
		{ 
		$email = $_SESSION["email"];
		//<a href="logout.php"><span>LogOut</span></a>
		?>
			<li><a href="candidate_panel.php"><span>My Account</span></a>
			
			</li>
		
		<?PHP 
		
		}
		else
		{ 
		 ?>
		 <li><a href="candidate_login.php"><span>Login</span></a></li>		 
		
		<?PHP 
		 }
		 ?>
         
		  <li><a href="contact.php"><span>Contact Us</span></a></li>	
		
        </ul>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="935" height="307" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article" style="width:100%">
		
			  <form method="post">

<caption><h1><span >Candidate Education</span></h1></caption>
				<table id="register">

	<tr>
					<td>Degree Name &nbsp;:&nbsp;</td>
					<td>
						<select name="degreename"  class="text"  required='required'>
						
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
	<td> Discipline &nbsp;:&nbsp;</td>
	<td> 
	
	<select name="Level"  class="text"  required='required'>
						
				<?php
				$query = "SELECT * FROM  Technology "; 
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
	<td> Date Of Admission&nbsp;:&nbsp;</td>
	<td> 
		<input type="Date" class="text" name="dateofadmission" placeholder="Write date of admission here" required value="<?PHP if(isset($_SESSION['dateofadmission'])){echo $_SESSION['dateofadmission'];}?>">
	</td>
	
</tr>
<tr>
	<td> Date Of Passing&nbsp;:&nbsp;</td>  
	<td> 
		<input type="Date" class="text" name="dateofpassing"  placeholder="Write date of passing here" required value="<?PHP if(isset($_SESSION['dateofpassing'])){echo $_SESSION['dateofpassing'];}?>">
	</td>
<tr>
	<td> Percentage&nbsp;:&nbsp;</td>
	<td> 
		<input type="number" class="text" name="percentate" placeholder="Write percentage here" required  value="<?PHP if(isset($_SESSION['percentate'])){echo $_SESSION['percentate'];}?>">
	</td>
</tr>
<tr>
	<td> Division&nbsp;:&nbsp;</td>
	<td> 
		<input type="Text" class="text" name="division" placeholder="Write Division here" required   value="<?PHP if(isset($_SESSION['division'])){echo $_SESSION['division'];}?>">
	</td>
</tr>
<tr>
	<td> Specialization&nbsp;:&nbsp;</td>
	<td> 
		<input type="Text" class="text" name="specialization"placeholder="Write specialization here" required  value="<?PHP if(isset($_SESSION['specialization'])){echo $_SESSION['specialization'];}?>">
	</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;</td>
	<td>
	
<input type="Submit" class="btnSubmit" name="Insert"  value="<?php if(isset($_GET['uid'])){echo "Update";}else {echo "Insert";} ?>" /> </td>
</td>
</tr>
</table>
			</form>
			
			
<table name="files">
					<tr>

						<th>Degree Name</th>
						<th>Discipline</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Percentage</th>
						<th>Division </th>
						<th>Specialization </th>
						<th>Update</th>
						<th>Delete </th>
				
					</tr>
		<?php
		
		
		
    $query = "SELECT * FROM `candidateeducation` INNER JOIN qualification ON qualification.QID =candidateeducation.QID inner join technology on technology.TechID = candidateeducation.TechID  WHERE candidateemail='$candidateemail'";

    $result = mysql_query($query);     	
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['QName']."</td>";
	echo "<td>".$row['TechName']."</td>";

	echo "<td>".$row['dateofadmission']."</td>";
	
	echo "<td>".$row['dateofpassing']."</td>";
	echo "<td>".$row['percentate']."</td>";
	
	echo "<td>".$row['division']."</td>";
	echo "<td>".$row['specialization']."</td>";
	
	
	echo "<td><a href=education.php?uid=".$row['candidateeducationid']." >Update</a></td>";
	echo "<td><a href=education.php?did=".$row['candidateeducationid']." >Delete</a></td>";
	 
	 echo "</tr>";

}
		
		
		
		?>
		
		</table>
          <div class="clr"></div>
        </div>
       
      </div>
      <div class="sidebar">
        <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		 <h2 class="star"><span>My Account</span></h2>
            <li><img src="images/images.png" style="width: 21px;" />
			<a href="candidate_panel.php">Job History
			 <?php
			
				$jobHistory =mysql_query("SELECT * FROM jobs INNER JOIN positionannouncement ON jobs.`PositionID` = positionannouncement.`positionannouncementid`
INNER JOIN company ON company.`companyid`=positionannouncement.`companyid`
WHERE CandidateEmail='$email'");
				
				$comment_count=mysql_num_rows($jobHistory);
				if($comment_count!=0)
				{
				echo '<span id="mes" style="position:absolute; float:left; margin-left:230px; margin-top:610px;">'.$comment_count.'</span>';
				}
			?></li>
		   <li><a href="jobs.php">All Jobs</a></li>
            <li><a href="candidate_profile.php">Profile Details</a></li>
            <li><a href="education.php">Academic Details</a></li>
			<li><a href="Experience.php">Experience Details</a></li>
			<li><a href="skills.php">Skills Details</a></li>
			<li><a href="achievements.php">Achievement Details</a></li>
			<li><a href="certification.php">Certification Details</a></li>
			<li><a href="logout.php">Logout</a></li>
			
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
