<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
$cmpID =0; 
$msg = "";
if(!isset($_SESSION["id"]))
	{

		header('Location:company_login.php');
		exit;		
	}
$Positionid=$_GET["id"];
$cmpID = $_SESSION["id"];

	
					
if(!empty($_POST['send_alert']))
{
// Loop to store and display values of individual checked checkbox.
foreach($_POST['send_alert'] as $selected)
{
$Set_shortlisted_candidates =  "update jobs set status='Short Listed' where PositionID=$Positionid AND compantID=$cmpID AND CandidateEmail='$selected'";
mysql_query($Set_shortlisted_candidates);
//echo $Set_shortlisted_candidates;
$msg = $msg." Status Updated! Email has been sent to $selected </br>";
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
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="images/slide2.jpg" width="935" height="307" alt="" /> </a> <a href="#"><img src="images/slide3.jpg" width="935" height="307" alt="" /> </a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
  
    <div class="content_resize">
	
      <div class="mainbar">
	  
        <div class="article" style="margin-bottom:40px;">
		
          <h2><span>Candidates</span></h2>
		   
		   <table>
		   
			<tr>
			<td></td>			<td></td>			<td></td>			<td></td>			<td></td>			<td></td>			<td></td>			<td></td>
			</form></td>
			<td><form method="post"></form></td>
			</tr>
				
		  </table> 
		  
		  <br>
		  <table>
		 
		  	 <form method="post" >
			 
				<table>
				<tr>
				<td colspan="20" style="float:right;" >
				<input type="submit" class="btnSubmit" id="btnReport"  onclick="printContent('ReportDiv')" style="width:100px;  height:25px;" value="View Report"/></td>
				<td colspan="20" style="float:right;" >
				<input type="submit" class="btnSubmit" id="btnupdate"  style="width:80px;  height:25px;" value="Send Alert"/></td>
				
				
				<tr>
				<td style="color:red;">
				<?PHP echo $msg; ?>
				</td>
				</tr>
				</tr>
				</table>
				<div id="ReportDiv">
				<table name="files"  >
					<tr>

						<th>Job</th>
						<th>Candidate CV</th>
						<th>Experience_Points</th>
						<th>Certification_Points</th>
						<th>Achievments_Points</th>						
						<th>Skill_Points</th>						
						<th>Total_Additional_Points</th>												
						<th>Matching%</th>
						<th>Date Applied</th>
						<th>Short List</th>
						
					</tr>
		
		
		<?php
		// 100 percentage matching candiate
		// qualification, experience and cerifications and skills matachs.

$FullMatch_query = "SELECT distinct * FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`

WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND 
(SELECT SUM(ex.`candidateExprnce`) FROM candidateexperience ex WHERE ex.`candidateemail` = candidate.`email`) >= positionannouncement.`experiencerequired` 
AND
(SELECT COUNT(sk.`skillID`) FROM candidateskill sk WHERE sk.`candidateemail` = candidate.`email`) >= (SELECT COUNT(pd.`SkillID`) FROM positiondetails pd WHERE pd.`PositionID` = positionannouncement.`positionannouncementid`)
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
AND
(
 SELECT COUNT(cert.`candidateCertificate`) FROM candidatecertification cert WHERE cert.`candidateemail`= candidate.`email`
 AND cert.`candidateCertificate` LIKE (SELECT positionannouncement.`certificationrequired` FROM positionannouncement WHERE positionannouncement.`positionannouncementid` = $Positionid AND positionannouncement.`companyid` = $cmpID)
) > 0";

					$checkEmail = Array();
					$result = mysql_query($FullMatch_query);
					//echo $FullMatch_query;
					$index =0;
					while($row = mysql_fetch_array($result))
					{
						
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";

					    	echo "<td style='color:red;'>100%</td>";
					    	echo "<td style='color:red;'>100%</td>";
					    	echo "<td style='color:red;'>100%</td>";
					    	echo "<td style='color:red;'>100%</td>";														
					    	echo "<td style='color:red;'>100%</td>";							
					    	echo "<td style='color:red;'>100%</td>";										            
							echo "<td>".$row['Date']."</td>";
			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
				
												
                    }
					
					// 80 percentage matching candiate
					// qualification, experience and cerifications mataches
$EightyPercent_query  = "SELECT * FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`
WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND 
(
SELECT SUM(ex.`candidateExprnce`) FROM candidateexperience ex WHERE ex.`candidateemail` = candidate.`email` >= positionannouncement.`experiencerequired`
) 
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
AND
(
 SELECT COUNT(cert.`candidateCertificate`) FROM candidatecertification cert WHERE cert.`candidateemail`= candidate.`email`
 AND cert.`candidateCertificate` LIKE (SELECT positionannouncement.`certificationrequired` FROM positionannouncement WHERE  positionannouncement.`positionannouncementid` = $Positionid AND positionannouncement.`companyid` = $cmpID)
) > 0
AND candidate.`email` 
Not In
(
SELECT distinct candidate.`email` FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`

WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND 
(SELECT SUM(ex.`candidateExprnce`) FROM candidateexperience ex WHERE ex.`candidateemail` = candidate.`email`) >= positionannouncement.`experiencerequired` 
AND
(SELECT COUNT(sk.`skillID`) FROM candidateskill sk WHERE sk.`candidateemail` = candidate.`email`) >= (SELECT COUNT(pd.`SkillID`) FROM positiondetails pd WHERE pd.`PositionID` = positionannouncement.`positionannouncementid`)
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
AND
(
 SELECT COUNT(cert.`candidateCertificate`) FROM candidatecertification cert WHERE cert.`candidateemail`= candidate.`email`
 AND cert.`candidateCertificate` LIKE (SELECT positionannouncement.`certificationrequired` FROM positionannouncement WHERE positionannouncement.`positionannouncementid` = $Positionid AND positionannouncement.`companyid` = $cmpID)
) > 0
)";
					$result = mysql_query($EightyPercent_query );
					while($row = mysql_fetch_array($result))
					{
				
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
					    	echo "<td style='color:red;'>80%</td>";
			            
							echo "<td>".$row['Date']."</td>";
			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
								
                    }	
					
					
					// 60 percentage matching candiate
					// Experience and Qualification matches
$Sixty_Percent_query  = "SELECT * FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`

WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND 
(SELECT SUM(ex.`candidateExprnce`) FROM candidateexperience ex WHERE ex.`candidateemail` = candidate.`email`) >= positionannouncement.`experiencerequired` 
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
AND candidate.`email`
NOT IN  (
SELECT candidate.`email` FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`
WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND 
(SELECT SUM(ex.`candidateExprnce`) FROM candidateexperience ex WHERE ex.`candidateemail` = candidate.`email`) >= positionannouncement.`experiencerequired` 
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
AND
(
 SELECT COUNT(cert.`candidateCertificate`) FROM candidatecertification cert WHERE cert.`candidateemail`= candidate.`email`
 AND cert.`candidateCertificate` LIKE (SELECT positionannouncement.`certificationrequired` FROM positionannouncement WHERE  positionannouncement.`positionannouncementid` = $Positionid AND positionannouncement.`companyid` = $cmpID)
) > 0
)

";
				$result = mysql_query($Sixty_Percent_query );
					while($row = mysql_fetch_array($result))
					{
						
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
					    	echo "<td style='color:red;'>60%</td>";
							
							echo "<td>".$row['Date']."</td>";
			                if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
                         
                    }	
					
					//50 percentage matching candiate
					//Only Qualification Matches 
$Fifty_Percent_query  = "SELECT * FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`
WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
AND candidate.`email`
NOT IN
(
SELECT candidate.`email` FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`

WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND 
(SELECT SUM(ex.`candidateExprnce`) FROM candidateexperience ex WHERE ex.`candidateemail` = candidate.`email`) >= positionannouncement.`experiencerequired` 
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)

)

";
				$result = mysql_query($Fifty_Percent_query );
					while($row = mysql_fetch_array($result))
					{
						
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
					    	echo "<td style='color:red;'>50%</td>";
			            
							echo "<td>".$row['Date']."</td>";
			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
						  
						
                    }	
					
					//Less then 40 percentage matching candiate
					// Just Applied 
$Less_forty_Percent_query  = "SELECT * FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`
WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND candidate.`email` NOT IN
(
SELECT candidate.`email` FROM candidate
INNER JOIN jobs ON jobs.`CandidateEmail`= candidate.`email`
INNER JOIN positionannouncement ON jobs.`PositionID`= positionannouncement.`positionannouncementid`
INNER JOIN company ON positionannouncement.`companyid`= company.`companyid`
WHERE PositionID =$Positionid AND company.`companyid` = $cmpID
AND
(SELECT ed.QID FROM candidateeducation ed WHERE ed.`candidateemail` = candidate.`email` AND positionannouncement.`QID` = ed.`QID`)
)
";

					
					$result = mysql_query($Less_forty_Percent_query);
					while($row = mysql_fetch_array($result))
					{
						
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
					    	echo "<td style='color:red;'>Under 40%</td>";
			            
							echo "<td>".$row['Date']."</td>";
			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
						
                    }							
					
					

?>
		 
</table>

			</form>
		  
	</div>
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
  
  
  
  
  
  
  
  
  
  
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Services</span> Overview</h2>
       <p>resume analyzer is best solution to incorporate in your organization to make your recruitment task easy and effective. Recruitment is a tedious job and involves very complex activities like searching and scrutinizing number of resumes of applicants in order to short list potential candidates. Resume analyzer gives you relief in all these time consuming and lengthy activities so that you can work smartly</p>
        <ul class="fbg_ul">
          <li>Resume analyzer is a web based solution that does job of parsing resume.</li>
          <li>It can parse thousands of resumes in few seconds.</li>
          <li>The recruitment process starts from collecting resumes from applicants.</li>
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
         <p> If you want to contact see the details below</p>
        <p class="contact_info"> <span>Address:</span> MUET Jamshoro, Batch 11<br />
          <span>Telephone:</span>+92 333 3044914<br />
          
          <span>Others:</span> +92 301 3158530<br />
          <span>E-mail:</span> <a href="#">zulfiqarshaikh49@gmail.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright <a href="#">Resume Analyzer</a>.</p>
      <p class="rf">Design by Mehranian <a href="http://www.muet.edu.pk/">MUET Final Year Project</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
