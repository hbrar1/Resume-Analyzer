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
$email=$_GET["email"];

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

<script> function printContent(el)
{ 

var restorepage = document.body.innerHTML; 
var printcontent = document.getElementById(el).innerHTML;
 document.body.innerHTML = printcontent; window.print(); 
 document.body.innerHTML = restorepage; 
 
 } </script>

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
	  <span style="color:white"> <h2 align="right" style="color:black">Welcome : <?PHP echo $_SESSION["email"]; ?></h2></span>
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
				echo '<span id="mes1">'.$comment_count.'</span>';
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
          
         <li>
		 <a href="Register.php" style="padding:15px 15px;">Register
			<img src="images/images.png" style="width: 21px; padding-right:50px;" />
			<?php

				$Mysql=mysql_query("select * FROM candidate");
				$Regcomment_count=mysql_num_rows($Mysql);
				if($Regcomment_count!=0)
				{
				echo '<span id="mes">'.$Regcomment_count.'</span>';
				}
			?>
			</a>
		 </li>
		 
		 <?PHP 
		if(isset($_SESSION["id"]))
		{ 
		?>
			<li><a href="company_panel.php"><span>My Account</span></a>
			 
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
        <div id="coin-slider">
		<a href="#"><img src="images/slide1.jpg" width="935" height="307" alt="" /> </a> 
		 </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article"  id="printMe" style="margin-bottom:40px;">
          <h2><span>Candidate Details</span><input type="Button" class="btnSubmit"  onclick="printContent('printMe')" style="width:100px;  height:30px;" value="Print Resume"/></h2>
		  	 <form method="post" >
				<table name="files">
				
		
		
		<?php
		$result = mysql_query("SELECT * FROM candidate WHERE candidate.email='$email'");
					echo "<table><tr><th style='height:5px;' colspan='2'><h3><span>Personal Details</span></th></h3> </tr>	</table>";
					echo "<table name='files>'";
					
					echo "<tr><td><b>Picture</b></td><td><b>Full Name</b></td><td><b>Father Name</b></td><td><b>Gender</b></td><td><b>Address</b></td><td><b>Country</b></td><td><b>Birth_Date</b></td></tr>";
					while($row = mysql_fetch_array($result))
					{
						
							
							
						
	echo "<tr><td><img src='candupload/".$row['picture']."' width='50' height='50'/></td><td>".$row['firstname'] ."</td><td>".$row['fathersname']."</td><td>".$row['gender']."</td><td>".$row['postaladdress']."</td><td>".$row['country']."</td><td>".$row['dateofbirth']."</td></tr>";
									
									
									
									
                          
                    }
echo "</table>";
					
$result = mysql_query("SELECT * FROM candidateeducation Inner join Qualification on candidateeducation.QID = Qualification.QID inner join Technology on candidateeducation.TechID = technology.TechID  WHERE candidateeducation.candidateemail='$email'");
					echo "<table><tr><th style='height:5px;' colspan='2'><h3><span>Education Details</span></th></h3> </tr>	</table>";
					echo "<table name='files>'";
					
					echo "<tr><td><b>Degree Name</b></td><td><b>Disciplan</b></td><td><b>Start_Date</b></td><td><b>End_Date</b></td><td><b>Percentage</b></td><td><b>Division</b></td></tr>";
					while($row = mysql_fetch_array($result))
					{
									
									echo "<tr><td>".$row['QName'] ."</td><td>".$row['TechName']."</td><td>".$row['dateofadmission']."</td><td>".$row['dateofpassing']."</td><td>".$row['percentate']."</td><td>".$row['division']."</td></tr>";
									
									
									
									
                          
                    }
echo "</table>";
$result = mysql_query("SELECT * FROM candidateexperience  WHERE candidateexperience.candidateemail='$email'");
					echo "<table><tr><th style='height:5px;' colspan='2'><h3><span>Experience Details</span></th></h3> </tr>	</table>";
					echo "<table name='files' >";
					
					echo "<tr><td><b>Company Name</b></td><td><b>Designation</b></td><td><b>Start_Date</b></td><td><b>End_Date</b></td><td><b>Experience</b></td></tr>";
					while($row = mysql_fetch_array($result))
					{
									
						echo "<tr><td>".$row['employer'] ."</td><td>".$row['designation']."</td><td>".$row['datestart']."</td><td>".$row['dateend']."</td><td>".$row['candidateExprnce']."</td></tr>";
					
                    }
echo "</table>";
$result = mysql_query("SELECT * FROM candidateskill Inner join skills on candidateskill.skillID = skills.skillID inner join Technology on skills.TechID = technology.TechID  WHERE candidateskill.candidateemail='$email'");
					echo "<table><tr><th style='height:5px;' colspan='2'><h3><span>Skills Details</span></th></h3> </tr>	</table>";
					echo "<table name='files' style='width:400px;'>";
					
					echo "<tr><td><b>Technology</b></td><td><b>Skill Name</b></td><td><b>Experience(years)</b></td></tr>";
					while($row = mysql_fetch_array($result))
					{
									
									echo "<tr><td>".$row['TechName'] ."</td><td>".$row['skillName']."</td><td>".$row['experience']."</td></tr>";
					
                    }
echo "</table>";
$result = mysql_query("SELECT * FROM candidatecertification  WHERE candidatecertification.candidateemail='$email'");
					echo "<table><tr><th style='height:5px;' colspan='2'><h3><span>Certification Details</span></th></h3> </tr>	</table>";
					echo "<table name='files' style='width:400px;'>";
					
					echo "<tr><td><b>Certification Title</b></td><td><b>Certification Date</b></td><td><b>Remarks</b></td></tr>";
					while($row = mysql_fetch_array($result))
					{
									
						echo "<tr><td>".$row['candidateCertificate'] ."</td><td>".$row['certificationdate']."</td><td>".$row['remarks']."</td></tr>";
					
                    }
echo "</table>";

$result = mysql_query("SELECT * FROM candidateachievement  WHERE candidateachievement.candidateemail='$email'");
					echo "<table><tr><th style='height:5px;' colspan='2'><h3><span>Achievement Details</span></th></h3> </tr>	</table>";
					echo "<table name='files' style='width:400px;'>";
					
					echo "<tr><td><b>Achievement Title</b></td><td><b>Achievement Date</b></td><td><b>Remarks</b></td></tr>";
					while($row = mysql_fetch_array($result))
					{
									
						echo "<tr><td>".$row['achievementtitle'] ."</td><td>".$row['achivemnetdate']."</td><td>".$row['canremarks']."</td></tr>";
					
                    }
echo "</table>";


?>
		 
</table>

			</form>
		  
	
          <div class="clr"></div>
        </div>
      
      </div>
      <div class="sidebar">
       
		 <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		  <h2 class="star"><span>My Account</span></h2>
		  <?php if(isset($_SESSION["id"]))
		{
		?>
           <li><a href="company_panel.php">Company DashBoard</a></li>
		    <li><a href="cjobs.php">Jobs</a></li>
            <li><a href="company.php">Company Profile</a></li>
            <li><a href="positionAnnoucement.php.">Jobs Announcement</a></li>
			<li><a href="logout.php">Logout</a></li>
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
