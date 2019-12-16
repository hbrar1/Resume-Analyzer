<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();

if(!isset($_SESSION["email"]))
	{
		header('Location:login_ResumeAnalyzer.php');
		exit;		
	}	
	$candidateemail = $_SESSION["email"];
	$_SESSION['candidiateAch']="";
	$_SESSION['achievementtitle']="";
	$_SESSION['achivemnetdate']="";
	$_SESSION['canremarks']="";
	
				if( isset( $_GET['uid'] ))
				{
					
						$uid=$_GET['uid'];
						$query = "SELECT * FROM candidateachievement where candidateacievemnetid='$uid' ";
						//echo $query;
						$result = mysql_query($query);
						
						while($row = mysql_fetch_array($result))
						{
							 $_SESSION['candidateacievemnetid']=$row['candidateacievemnetid'];
							 $_SESSION['test']=$row['candidateemail'];
							 $candidiateAch= $row['candidiateAch'];   
							 $achievementtitle= $row['achievementtitle'];
							 $achivemnetdate= $row['achivemnetdate'];   
							 $canremarks= $row['canremarks'];
							
						}
							$_SESSION['candidiateAch']=$candidiateAch;
							$_SESSION['achievementtitle']= $achievementtitle;
							$_SESSION['achivemnetdate']=$achivemnetdate;
							$_SESSION['canremarks']=$canremarks;
				}
						 
							
					
					
					if ( isset( $_POST['Insert'] ) && !isset($_SESSION['test']) )
					{ 		
					
						if (isset($_POST["candidiateAch"]) && !empty($_POST["candidiateAch"]) && isset($_POST["achievementtitle"]) && !empty($_POST["achievementtitle"]) )
						{
							
							$candidateacievemnetid=$_SESSION['candidateacievemnetid'];
							 
							
							
							   $candidiateAch = $_POST['candidiateAch']; 
							   $candidateemail = $_SESSION["email"];
							   $achievementtitle= $_POST['achievementtitle'];
							   $achivemnetdate= $_POST['achivemnetdate'];   
							   $canremarks= $_POST['canremarks'];
							 
							$_SESSION['candidiateAch']=$candidiateAch;
							$_SESSION['achievementtitle']= $achievementtitle;
							$_SESSION['achivemnetdate']=$achivemnetdate;
							$_SESSION['canremarks']=$canremarks;
 
 
							 $sql="INSERT INTO `candidateachievement`( `candidiateAch`, `candidateemail`,`achievementtitle`, `achivemnetdate`, `canremarks`) VALUES ('$candidiateAch','$candidateemail','$achievementtitle','$achivemnetdate','$canremarks')";
							echo $sql;
							if (!mysql_query($sql)) {
							echo "eror achievementtitle";
							}
							else
							{	
						
							$_SESSION['candidiateAch']="";
							$_SESSION['achievementtitle']="";
							$_SESSION['achivemnetdate']="";
							$_SESSION['canremarks']="";
					
							}	
	
  
						}
	}
	else
		
	{
			if (isset($_POST["candidiateAch"]) && !empty($_POST["candidiateAch"]) && isset($_POST["achievementtitle"]) && !empty($_POST["achievementtitle"]) )
				{
					$candidateacievemnetid=$_SESSION['candidateacievemnetid'];
						$candidiateAch = $_POST['candidiateAch']; 
						$candidateemail = $_SESSION["email"];
						$achievementtitle= $_POST['achievementtitle'];
						$achivemnetdate= $_POST['achivemnetdate'];   
						$canremarks= $_POST['canremarks'];
					
									
							$sql = "UPDATE candidateachievement SET candidiateAch='$candidiateAch' ,candidateemail='$candidateemail',achievementtitle='$achievementtitle',achivemnetdate='$achivemnetdate',canremarks='$canremarks'where candidateacievemnetid='$candidateacievemnetid'";
							 //echo $sql;
							if (!mysql_query($sql)) {
							  echo "eror";
							}
							else
							{
							$_SESSION['candidiateAch']=$candidiateAch;
							$_SESSION['achievementtitle']= $achievementtitle;
							$_SESSION['achivemnetdate']=$achivemnetdate;
							$_SESSION['canremarks']=$canremarks;
						unset($_SESSION['test']);
						header('Location:achievements.php');
	
	
							}
		
				
			}
	}
	
	if( isset( $_GET['did'] ))
	{
			$did=$_GET['did'];
			$query = "delete FROM candidateachievement where candidateacievemnetid='$did' ";
			//echo $query;
			if (!mysql_query($query)) {
			echo "error delete";
			}
			else
			{	
		
		
		
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
<style>
th {
  text-align: left;
  color: white;
  background-color: rgba(217, 133, 59, 0.97);
font-size: 1.25em;
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
			<span style="color:white"> <h2 align="right" style="color:black">Welcome : <?PHP echo $_SESSION["email"]; ?></h2></span>
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
		{ //<a href="logout.php"><span>LogOut</span></a>
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
        <div class="article">
<form method="post">

<caption><h1><span >Candidate Achievements</span></h1></caption>
			  
<table>



<tr>
	<td> Candidate Achievement&nbsp;:&nbsp;</td>
	<td> 
		<input type="text" class="text" name="candidiateAch" placeholder="Write Achievement here" required value="<?PHP if(isset($_SESSION['candidiateAch'])){echo $_SESSION['candidiateAch'];}?>"> 
	</td>
</tr>
<tr>
	<td> Achievement Title&nbsp;:&nbsp;</td>
	<td> 
		<input type="Text" class="text" name="achievementtitle" placeholder="Write Title here" required  value="<?PHP if(isset($_SESSION['achievementtitle'])){echo $_SESSION['achievementtitle'];}?>"> 
	</td>
</tr>
<tr>
	<td> Achievement Date&nbsp;:&nbsp;</td>
	<td> 
		<input type="Date" class="text" name="achivemnetdate"  placeholder="Write Date here" required value="<?PHP if(isset($_SESSION['achivemnetdate'])){echo $_SESSION['achivemnetdate'];}?>"> 
	</td>
</tr>
<tr>
	<td> Remarks&nbsp;:&nbsp;</td>
	<td> 
		<input type="Text" class="text" name="canremarks"   placeholder="Write Remarks here" required value="<?PHP if(isset($_SESSION['canremarks'])){echo $_SESSION['canremarks'];}?>"> 
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

						<th>Achievement</th>
						<th>Title</th>
						<th>Date</th>
						<th>Remarks </th>
						<th>Update</th>
						<th>Delete </th>
				
					</tr>
		<?php
		
		
		
    $query = "SELECT * FROM `candidateachievement` WHERE candidateemail='$candidateemail'";

    $result = mysql_query($query);     	
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['1']."</td>";
	echo "<td>".$row['3']."</td>";

	echo "<td>".$row['4']."</td>";
	
	echo "<td>".$row['5']."</td>";

	echo "<td><a href=achievements.php?uid=".$row['0']." >Update</a></td>";
	echo "<td><a href=achievements.php?did=".$row['0']." >Delete</a></td>";
	 
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
          <li><a href="candidate_panel.php">Job History</a></li>
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
