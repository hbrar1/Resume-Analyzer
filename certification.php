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
					
		$candidateemail = $_SESSION["email"];
		$_SESSION['candidateCertificate']="";
		$_SESSION['certificationdate']="";
		$_SESSION['certificationtitle']="";
		$_SESSION['remarks']="";
					 
		if( isset( $_GET['uid'] ))
			{
				
				$uid=$_GET['uid'];
				$query = "SELECT * FROM candidatecertification where candidatecertid='$uid' ";
				//echo $query;
				$result = mysql_query($query);
			 
			
				while($row = mysql_fetch_array($result))
				{
					 $_SESSION['candidatecertid']=$row['candidatecertid'];
					 $_SESSION['test']=$row['candidateemail'];
					 $candidateCertificate= $row['candidateCertificate'];   
					 $certificationtitle= $row['certificationtitle'];
					 $certificationdate= $row['certificationdate'];   
					 $remarks= $row['remarks'];
				}

						$_SESSION['candidateCertificate']=$candidateCertificate;
						$_SESSION['certificationdate']=$certificationdate;
						$_SESSION['certificationtitle']=$certificationtitle;
						$_SESSION['remarks']=$remarks;
					 
					
			}	
	
	
	if ( isset( $_POST['Insert'] ) && !isset($_SESSION['test']) )
	{ 

				if (isset($_POST["certificationtitle"]) && !empty($_POST["certificationtitle"]) && isset($_POST["certificationdate"]) && !empty($_POST["certificationdate"]) )
				{
						echo "in insert block";
						$candidateCertificate= $_POST['candidateCertificate'];   
						$candidateemail = $_SESSION["email"];
					    $certificationtitle= $_POST['certificationtitle'];
					    $certificationdate= $_POST['certificationdate'];   
					    $remarks= $_POST['remarks'];
					 

					   
					 $sql="INSERT INTO `candidatecertification`( `candidateCertificate`,`candidateemail`, `certificationtitle`, `certificationdate`, `remarks`) VALUES ('$candidateCertificate','$candidateemail','$certificationtitle','$certificationdate',' $remarks')";
					// echo $sql;
					 if (!mysql_query($sql)) {
                      echo "eror certificate";
                       }
                       else
                       {
						   
						$_SESSION['candidateCertificate']="";
						$_SESSION['certificationdate']="";
						$_SESSION['certificationtitle']="";
						$_SESSION['remarks']="";
						   
                        }
				}
				else
				{
					
				}
	}
	if(isset( $_POST['Insert'] ) && isset($_SESSION['test']) )
	{
					$candidatecertid= $_SESSION['candidatecertid'];
						$candidateCertificate= $_POST['candidateCertificate'];   
						$candidateemail = $_SESSION["email"];
					    $certificationtitle= $_POST['certificationtitle'];
					    $certificationdate= $_POST['certificationdate'];   
					    $remarks= $_POST['remarks'];
		 
		 $sql = "UPDATE candidatecertification SET candidateCertificate='$candidateCertificate' ,candidateemail='$candidateemail',certificationtitle='$certificationtitle',certificationdate='$certificationdate',remarks='$remarks' where candidatecertid='$candidatecertid'";
  
		echo $sql;
			if (!mysql_query($sql)) {
					echo "eror";
			}
			else
			{
				
						
					    $_SESSION['candidateCertificate']=$candidateCertificate;
						$_SESSION['certificationdate']=$certificationdate;
						$_SESSION['certificationtitle']=$certificationtitle;
						$_SESSION['remarks']=$remarks;
						unset($_SESSION['test']);
						header('Location:certification.php');
			}
		
		
		
		
	}
	
	if( isset( $_GET['did'] ))
	{
			$did=$_GET['did'];
			$query = "delete FROM candidatecertification where candidatecertid='$did' ";
			//echo $query;
			if (!mysql_query($query)) {
			echo "error delete";
			}
			else
			{	
		
		
		
			}
	
	}
	
	/*
	if(isset($_SESSION["Reg"]))
	{
	
	
	
if (isset($_POST["certificationtitle"]) && !empty($_POST["certificationtitle"]) && isset($_POST["certificationdate"]) && !empty($_POST["certificationdate"]) )
{
						$candidateCertificate= $_POST['candidateCertificate'];   
						$candidateemail = $_SESSION["email"];
					    $certificationtitle= $_POST['certificationtitle'];
					    $certificationdate= $_POST['certificationdate'];   
					    $remarks= $_POST['remarks'];
					 

					    $_SESSION['candidateCertificate']=$candidateCertificate;
						$_SESSION['certificationdate']=$certificationdate;
						$_SESSION['certificationtitle']=$certificationtitle;
						$_SESSION['remarks']=$remarks;
					    header('Location:experience.php');

}


	}
	
	else
	{
		
}*/
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
			  
			  
		<caption><h1><span >Candidate Certifications</span></h1></caption>
			<table id="register">


<tr>
	<td> Certification Name&nbsp;:&nbsp;</td>
	<td> 

		<input type='text' required="required" class="text" name="candidateCertificate"placeholder="Write certification here"  value="<?PHP if(isset($_SESSION['candidateCertificate'])){echo $_SESSION['candidateCertificate'];}?>">
	</td>
</tr>
<tr>
	<td> Certification Title&nbsp;:&nbsp;</td>
	<td> 
		<input type="Text" class="text" name="certificationtitle"   placeholder="Write title here" required value="<?PHP if(isset($_SESSION['certificationtitle'])){echo $_SESSION['certificationtitle'];}?>">
	</td>
</tr>
<tr>
	<td> Certification Date&nbsp;:&nbsp;</td>
	<td> 
		<input type="date" class="text" name="certificationdate" placeholder="Write Date here" required value="<?PHP if(isset($_SESSION['certificationdate'])){echo $_SESSION['certificationdate'];}?>"> 
	</td>
</tr>
<tr>
	<td> Remarks&nbsp;:&nbsp;</td>
	<td> 
		<input type="Text" class="text" name="remarks" placeholder="Write Remarks here" required value="<?PHP if(isset($_SESSION['remarks'])){echo $_SESSION['remarks'];}?>"> 
</tr>
<tr>
	<td></td>
	<td><input type="Submit" class="btnSubmit" name="Insert"  value="<?php if(isset($_GET['uid'])){echo "Update";}else {echo "Insert";} ?>" /> </td>

	
	<!--<td>	<input type="Submit" class="btnSubmit" name="Submit" value="<?php if(isset($_SESSION['Reg'])){echo "Next";}else {echo "Update";} ?>" /> </td>
*-->

</tr>


</table>
			</form>
			
			
			<table name="files">
					<tr>

						<th>Certificate</th>
						<th>Title</th>
						<th>Date</th>
						<th>Remarks </th>
						<th>Update </th>
						<th>Delete </th>
									
					</tr>
		<?php
		
		
		
    $query = "SELECT * FROM `candidatecertification` WHERE candidateemail='$candidateemail'";

    $result = mysql_query($query);     	
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$row['1']."</td>";
	echo "<td>".$row['3']."</td>";

	echo "<td>".$row['4']."</td>";
	
	echo "<td>".$row['5']."</td>";
	$rm=$row['5'];
	echo "<td><a href=certification.php?uid=".$row['0']." >Update</a></td>";
	echo "<td><a href=certification.php?did=".$row['0']." >Delete</a></td>";
	 
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
