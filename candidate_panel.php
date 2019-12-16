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
	$email=$_SESSION["email"];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Resume analyzer</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-titillium-900.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>




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
	  <span style="color:white"> <h2 align="right" style="color:black">Welcome : <?PHP echo $_SESSION["firstname"] ?></h2></span> 
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
			
			$msql=mysql_query("select * from positionannouncement order by positionannouncementid desc ");
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
				$listsql=mysql_query("select * from positionannouncement order by positionannouncementid desc limit 0,3 ");
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
		{ //<a href="logout.php"><span>LogOut</span></a>
		?>
			<li><a href="candidate_panel.php"><span><img src="images/member.png" style="width:20px; height:15px;"/>My Account</span></a>
			
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
	<div class="sidebar">
        <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu" style="flat:left; ">
		  <h2 class="star"><span>My Account</span></h2>
		  <?php if(isset($_SESSION["email"]))
		{
		?>
             <li>
			 <img src="images/images.png" style="width: 21px;" />
			 <a href="candidate_panel.php" style="padding:10 0;">Job History
			
			<?php
			
				$jobHistory =mysql_query("SELECT * FROM jobs INNER JOIN positionannouncement ON jobs.`PositionID` = positionannouncement.`positionannouncementid`
INNER JOIN company ON company.`companyid`=positionannouncement.`companyid`
WHERE CandidateEmail='$email'");
				
				$comment_count=mysql_num_rows($jobHistory);
				if($comment_count!=0)
				{
				echo '<span id="mes" style="position:absolute; float:left; margin-left:230px; margin-top:610px;">'.$comment_count.'</span>';
				}
			?>
			</a>
			 
			 
			 </li>
		   <li ><a href="jobs.php">All Jobs</a></li>
            <li><a href="candidate_profile.php">Profile Details</a></li>
            <li><a href="education.php">Academic Details</a></li>
			<li><a href="Experience.php">Experience Details</a></li>
			<li><a href="skills.php">Skills Details</a></li>
			<li><a href="achievements.php">Achievement Details</a></li>
			<li><a href="certification.php">Certification Details</a></li>
			<li><a href="logout.php">Logout</a></li>
			<?php
		}
		?>
          </ul>
        </div>
		
       
      </div>		
      <div class="mainbar">
	   
	
	  
        <div class="article">
		  <h2 class="star"><span>WELCOM TO THE Job History</span></h2>
		  
		  
		  <h3>
		  <?php

		  if(isset($_SESSION['email'])) 
		  { 
				echo "Welcome       ".$_SESSION['email'];


				}  
	
		  
		  ?>



		  </h3>
		
        
        </div>
		
		  <div class="article">
          <h2><span>JOBS APPLIED</span></h2>
			 <form method="post" action="" id="login_form">
				<table >
		<tr>

<th>Position For</th>
<th>Description</th>

<th>Company </th>
<th>Applied Date</th>
<th>Status</th>


</tr>
	
		
		<?php

	
	

					$result = mysql_query("SELECT * FROM jobs INNER JOIN positionannouncement ON jobs.`PositionID` = positionannouncement.`positionannouncementid`
INNER JOIN company ON company.`companyid`=positionannouncement.`companyid`
WHERE CandidateEmail='$email'");
					while($row = mysql_fetch_array($result))
					{
							echo "<tr>";
							echo "<td>".$row['positiontitle']."</td>";
					    	echo "<td>".$row['description']."</td>";
							echo "<td>".$row['companyname']."</td>";
							echo "<td>".$row['Date'] ."</td>";
							
							echo "<td style='color:red'>".$row['status']."</td>";
					
							echo "</tr>";
			             
                    }

?>
		 
</table>

				
		


	<span id="msgbox" style="display:none">
	</span>


  
			</form>
          <div class="clr"></div>
        </div>
        <div class="article">

		 
        </div>
      </div>
     
      <div class="clr"></div>
    </div>
  </div>
<?php include('footer.php') ?>
</div>
</body>
</html>
