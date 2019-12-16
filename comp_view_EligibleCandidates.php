<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
$cmpID =0; 
$msg = "";

//require 'mailer/class/SMTPMailer.php';
//
//$mail = new SMTPMailer();
//
//$mail->addTo('yiioverflow@gmail.com');
//$mail->From("info@resumeanalyser.com","Resume Analyzer");
//
//$mail->Subject('Mail message for you');
//$mail->Body(
//    '<p>Dear Candidate,</p>
//    <p>Congratulations! You have shortlisted for the job'    
//);
//
//if ($mail->Send()) echo 'Mail sent successfully';  

if(!isset($_SESSION["id"]))
	{

		header('Location:company_login.php');
		exit;		
	}
$Positionid=$_SESSION["EligiblePositinID"];
$cmpID = $_SESSION["id"];

	
					
if(!empty($_POST['send_alert']))
{
// Loop to store and display values of individual checked checkbox.
foreach($_POST['send_alert'] as $selected)
{
$Set_shortlisted_candidates =  "update jobs set status='Short Listed' where PositionID=$Positionid AND compantID=$cmpID AND CandidateEmail='$selected'";
mysql_query($Set_shortlisted_candidates);
//echo $Set_shortlisted_candidates;
//Sending Email to the candidates


require 'mailer/class/SMTPMailer.php';

$mail = new SMTPMailer();

$mail->addTo($selected);
$mail->From("info@resumeanalyser.com","Resume Analyzer");

$mail->Subject('Mail message for you');
$mail->Body(
    '<p>Dear Candidate,</p>
    <p>Congratulations! You have shortlisted for the job'    
);

if ($mail->Send()) echo 'Mail sent successfully';
else               echo 'Mail failure';


//Sending Email to candidate ends
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
		
          <h2><span>Eligible Candidates</span></h2>
		   
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
						<th>C.V</th>
						<th>(Matching%)</th>
						<th>(Experience)</th>
						<th>(Skills_Matched)</th>
						<th>(Certification)</th>
						<th>(Education)</th>
						<th>(Total Points)</th>												

						<th>(Short List)</th>
						
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

					
					$result = mysql_query($FullMatch_query);
					//echo $FullMatch_query;
					$Exppionts =0;  
					$certPoints = 0;
					$skilPoint = 0;
					$eduPoints = 0;
                                        if($result)
                                        {
					while($row = mysql_fetch_array($result))
					{
						$cdEmail = $row['CandidateEmail'];
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
							echo "<td style='color:red;'>100%</td>";
						$exp = "SELECT tbl.Req, tbl2.Expr, (tbl2.Expr - tbl.Req) AS Extra FROM 
								(SELECT ps.experiencerequired Req FROM positionannouncement ps
									WHERE ps.positionannouncementid = $Positionid
								) AS tbl,
								(SELECT SUM(ex.`candidateExprnce`) Expr FROM candidateexperience ex
									INNER JOIN candidate cd ON cd.`email` = ex.`candidateemail`
									WHERE cd.`email` = '$cdEmail'
								 ) AS tbl2";
						$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
							//$extrExp = $course['Extra'];
							$total =   ($course['Expr'] - $course['Req']);
							if($total == 0)
							$extrExp = 1;
							else
							$extrExp = $total+1;
							
							$Exppionts = $extrExp;
								echo "<td style='color:red;'>(".$extrExp.") Points</td>";
							
							}
							
					    	
					    	$query = "SELECT COUNT(*) as point FROM candidateskill cs 
INNER JOIN positiondetails d ON d.`SkillID` = cs.`skillID`
WHERE cs.`candidateemail`='$cdEmail'
AND d.`PositionID` = $Positionid";
							
							$result = mysql_query($query);
							echo "<td style='color:red;'>(";
							while($course = mysql_fetch_array($result))
							{
							$skilPoint = $course['point'];
						     echo $course['point'];
							  }  													
							  echo ") Points</td>";
							  
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
(SELECT COUNT(*) AS edu FROM candidateCertification ct
WHERE ct.candidateemail = '$cdEmail' ) AS tbl,

 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
  WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$certPoints = $setEdu;
							}
							
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
							(SELECT COUNT(*) AS edu FROM candidateEducation ct
							WHERE ct.candidateemail = '$cdEmail' ) AS tbl,
							 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
							WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$eduPoints =$setEdu;
							}
							
							
							
							
							
							echo "<td style='color:red;'>(".($Exppionts + $certPoints + $skilPoint + $eduPoints).") </td>";
							  
					    											            

			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
				
												
                    }
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
					$Exppionts =0;  
					$certPoints = 0;
					$skilPoint = 0;
					$eduPoints = 0;
                                        if($result)
                                        {
					while($row = mysql_fetch_array($result))
					{
						$cdEmail = $row['CandidateEmail'];
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
							echo "<td style='color:red;'>80%</td>";
						$exp = "SELECT tbl.Req, tbl2.Expr, (tbl2.Expr - tbl.Req) AS Extra FROM 
								(SELECT ps.experiencerequired Req FROM positionannouncement ps
									WHERE ps.positionannouncementid = $Positionid
								) AS tbl,
								(SELECT SUM(ex.`candidateExprnce`) Expr FROM candidateexperience ex
									INNER JOIN candidate cd ON cd.`email` = ex.`candidateemail`
									WHERE cd.`email` = '$cdEmail'
								 ) AS tbl2";
						$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
							//$extrExp = $course['Extra'];
							$total =   ($course['Expr'] - $course['Req']);
							if($total == 0)
							$extrExp = 1;
							else
							$extrExp = $total+1;
							
							$Exppionts = $extrExp;
								echo "<td style='color:red;'>(".$extrExp.") Points</td>";
							
							}
							
					    	
					    	$query = "SELECT COUNT(*) as point FROM candidateskill cs 
INNER JOIN positiondetails d ON d.`SkillID` = cs.`skillID`
WHERE cs.`candidateemail`='$cdEmail'
AND d.`PositionID` = $Positionid";
							
							$result = mysql_query($query);
							echo "<td style='color:red;'>(";
							while($course = mysql_fetch_array($result))
							{
							$skilPoint = $course['point'];
						     echo $course['point'];
							  }  													
							  echo ") Points</td>";
							  
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
(SELECT COUNT(*) AS edu FROM candidateCertification ct
WHERE ct.candidateemail = '$cdEmail' ) AS tbl,

 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
  WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$certPoints = $setEdu;
							}
							
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
							(SELECT COUNT(*) AS edu FROM candidateEducation ct
							WHERE ct.candidateemail = '$cdEmail' ) AS tbl,
							 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
							WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$eduPoints =$setEdu;
							}
							
							
							
							
							
							echo "<td style='color:red;'>(".($Exppionts + $certPoints + $skilPoint + $eduPoints).") </td>";
							  
					    											            

			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
				
												
                    }
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
					$Exppionts =0;  
					$certPoints = 0;
					$skilPoint = 0;
					$eduPoints = 0;
                                        if($result)
                                        {
					while($row = mysql_fetch_array($result))
					{
						$cdEmail = $row['CandidateEmail'];
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
							echo "<td style='color:red;'>60%</td>";
						$exp = "SELECT tbl.Req, tbl2.Expr, (tbl2.Expr - tbl.Req) AS Extra FROM 
								(SELECT ps.experiencerequired Req FROM positionannouncement ps
									WHERE ps.positionannouncementid = $Positionid
								) AS tbl,
								(SELECT SUM(ex.`candidateExprnce`) Expr FROM candidateexperience ex
									INNER JOIN candidate cd ON cd.`email` = ex.`candidateemail`
									WHERE cd.`email` = '$cdEmail'
								 ) AS tbl2";
						$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
							//$extrExp = $course['Extra'];
							$total =   ($course['Expr'] - $course['Req']);
							if($total == 0)
							$extrExp = 1;
							else
							$extrExp = $total+1;
							
							$Exppionts = $extrExp;
								echo "<td style='color:red;'>(".$extrExp.") Points</td>";
							
							}
							
					    	
					    	$query = "SELECT COUNT(*) as point FROM candidateskill cs 
INNER JOIN positiondetails d ON d.`SkillID` = cs.`skillID`
WHERE cs.`candidateemail`='$cdEmail'
AND d.`PositionID` = $Positionid";
							
							$result = mysql_query($query);
							echo "<td style='color:red;'>(";
							while($course = mysql_fetch_array($result))
							{
							$skilPoint = $course['point'];
						     echo $course['point'];
							  }  													
							  echo ") Points</td>";
							  
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
(SELECT COUNT(*) AS edu FROM candidateCertification ct
WHERE ct.candidateemail = '$cdEmail' ) AS tbl,

 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
  WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$certPoints = $setEdu;
							}
							
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
							(SELECT COUNT(*) AS edu FROM candidateEducation ct
							WHERE ct.candidateemail = '$cdEmail' ) AS tbl,
							 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
							WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$eduPoints =$setEdu;
							}
							
							
							
							
							
							echo "<td style='color:red;'>(".($Exppionts + $certPoints + $skilPoint + $eduPoints).") </td>";
							  
					    											            

			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
				
												
                    }	
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
					$Exppionts =0;  
					$certPoints = 0;
					$skilPoint = 0;
					$eduPoints = 0;
                                        if($result)
                                        {
					while($row = mysql_fetch_array($result))
					{
						$cdEmail = $row['CandidateEmail'];
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
							echo "<td style='color:red;'>50%</td>";
						$exp = "SELECT tbl.Req, tbl2.Expr, (tbl2.Expr - tbl.Req) AS Extra FROM 
								(SELECT ps.experiencerequired Req FROM positionannouncement ps
									WHERE ps.positionannouncementid = $Positionid
								) AS tbl,
								(SELECT SUM(ex.`candidateExprnce`) Expr FROM candidateexperience ex
									INNER JOIN candidate cd ON cd.`email` = ex.`candidateemail`
									WHERE cd.`email` = '$cdEmail'
								 ) AS tbl2";
						$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
							//$extrExp = $course['Extra'];
							$total =   ($course['Expr'] - $course['Req']);
							if($total == 0)
							$extrExp = 1;
							else
							$extrExp = $total+1;
							
							$Exppionts = $extrExp;
								echo "<td style='color:red;'>(".$extrExp.") Points</td>";
							
							}
							
					    	
					    	$query = "SELECT COUNT(*) as point FROM candidateskill cs 
INNER JOIN positiondetails d ON d.`SkillID` = cs.`skillID`
WHERE cs.`candidateemail`='$cdEmail'
AND d.`PositionID` = $Positionid";
							
							$result = mysql_query($query);
							echo "<td style='color:red;'>(";
							while($course = mysql_fetch_array($result))
							{
							$skilPoint = $course['point'];
						     echo $course['point'];
							  }  													
							  echo ") Points</td>";
							  
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
(SELECT COUNT(*) AS edu FROM candidateCertification ct
WHERE ct.candidateemail = '$cdEmail' ) AS tbl,

 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
  WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$certPoints = $setEdu;
							}
							
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
							(SELECT COUNT(*) AS edu FROM candidateEducation ct
							WHERE ct.candidateemail = '$cdEmail' ) AS tbl,
							 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
							WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$eduPoints =$setEdu;
							}
							
							
							
							
							
							echo "<td style='color:red;'>(".($Exppionts + $certPoints + $skilPoint + $eduPoints).") </td>";
							  
					    											            

			            if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
				
												
                    }
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
					$Exppionts =0;  
					$certPoints = 0;
					$skilPoint = 0;
					$eduPoints = 0;
                                        if($result)
                                        {
					while($row = mysql_fetch_array($result))
					{
						$cdEmail = $row['CandidateEmail'];
							echo "<tr>";
							echo "<td>".$row['positiontitle'] ."</td>";
							echo "<td><a href=candidate_details.php?email=".$row['CandidateEmail'].">".$row['CandidateEmail']."</a></td>";
							echo "<td style='color:red;'>Less 40%</td>";
						$exp = "SELECT tbl.Req, tbl2.Expr, (tbl2.Expr - tbl.Req) AS Extra FROM 
								(SELECT ps.experiencerequired Req FROM positionannouncement ps
									WHERE ps.positionannouncementid = $Positionid
								) AS tbl,
								(SELECT SUM(ex.`candidateExprnce`) Expr FROM candidateexperience ex
									INNER JOIN candidate cd ON cd.`email` = ex.`candidateemail`
									WHERE cd.`email` = '$cdEmail'
								 ) AS tbl2";
						$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
							//$extrExp = $course['Extra'];
							$total =   ($course['Expr'] - $course['Req']);
							if($total == 0)
							$extrExp = 1;
							else
							$extrExp = $total+1;
							
							$Exppionts = $extrExp;
								echo "<td style='color:red;'>(".$extrExp.") Points</td>";
							
							}
							
					    	
					    	$query = "SELECT COUNT(*) as point FROM candidateskill cs 
INNER JOIN positiondetails d ON d.`SkillID` = cs.`skillID`
WHERE cs.`candidateemail`='$cdEmail'
AND d.`PositionID` = $Positionid";
							
							$result = mysql_query($query);
							echo "<td style='color:red;'>(";
							while($course = mysql_fetch_array($result))
							{
							$skilPoint = $course['point'];
						     echo $course['point'];
							  }  													
							  echo ") Points</td>";
							  
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
(SELECT COUNT(*) AS edu FROM candidateCertification ct
WHERE ct.candidateemail = '$cdEmail' ) AS tbl,

 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
  WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$certPoints = $setEdu;
							}
							
							$exp = "SELECT (tbl.edu - tbl2.posedu) total FROM
							(SELECT COUNT(*) AS edu FROM candidateEducation ct
							WHERE ct.candidateemail = '$cdEmail' ) AS tbl,
							 (SELECT COUNT(*) AS posedu FROM  positionannouncement ps 
							WHERE ps.`positionannouncementid` =$Positionid) AS tbl2";
							
							$resultexp = mysql_query($exp);
							while($course = mysql_fetch_array($resultexp)){
						
						$setEdu = 0;
						if($course['total'] == 0)
							$setEdu = 1;
							else
							$setEdu = $course['total']+1;
							
							echo "<td style='color:red;'>(". $setEdu .") Points</td>";  
							$eduPoints =$setEdu;
							}
							
							
							
							
							
							echo "<td style='color:red;'>(".($Exppionts + $certPoints + $skilPoint + $eduPoints).") </td>";
							  
					    											            

                                                        if($row['status'] == "Applied")
								echo "<td><input type='checkbox'  name='send_alert[]' value=".$row['CandidateEmail']."></td></tr>";
							else
								echo "<td><input type='checkbox'  name='send_alert[]' checked='checked' value=".$row['CandidateEmail']."></td></tr>";
				
												
                    }
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
<?php include('footer.php') ?>
</div>
</body>
</html>
