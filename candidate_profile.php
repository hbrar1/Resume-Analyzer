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

	$gender=$_SESSION["gender"];
	$country=$_SESSION["country"];
	$q1=$_SESSION["q1"];
	$q2=$_SESSION["q2"];
	$filepath=$_SESSION["filepath"];
if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) )
{
	if ($_FILES["file"]["error"] > 0)
    {
    
		

$idd=$_SESSION["email"];



   
   $email = $_POST['email'];   
   $password= $_POST['password'];
   $firstname= $_POST['firstname'];   
 $lastname= $_POST['lastname'];
    $surname= $_POST['surname'];
   $fathersname= $_POST['fathersname'];   
 $gender= $_POST['gender'];
    $dateofbirth= $_POST['dateofbirth'];
   $postaladdress= $_POST['postaladdress'];   
 $permanentaddress= $_POST['permanentaddress'];
    $religion= $_POST['religion'];
   $country= $_POST['country'];   
	$q1= $_POST['q1'];
	$q2= $_POST['q2'];  
	
 //insert query lagandiiii
     $sql = "UPDATE candidate SET email='$email' ,password='$password',firstname='$firstname',lastname='$lastname',surname='$surname',fathersname='$fathersname',gender='$gender',dateofbirth='$dateofbirth',postaladdress='$postaladdress',permanentaddress='$permanentaddress',religion='$religion',country='$country',q1='$q1',q2='$q2' where email='$idd'";
  // echo $sql;
if (!mysql_query($sql)) {
  echo "eror";
}
else
{
				$_SESSION["email"]=$email;
				$_SESSION["password"]=$password;
				$_SESSION["firstname"]=$firstname;
				$_SESSION["lastname"]=$lastname;
				$_SESSION["surname"]=$surname;
				$_SESSION["fathersname"]=$fathersname;
				$_SESSION["gender"]=$gender;
				$_SESSION["dateofbirth"]=$dateofbirth;
				$_SESSION["postaladdress"]=$postaladdress;
				$_SESSION["permanentaddress"]=$permanentaddress;
				$_SESSION["religion"]=$religion;
				$_SESSION["country"]=$country;
				$_SESSION["q1"]=$q1;
				$_SESSION["q2"]=$q2;
			
	
	}

	}
	else
	{
		$idd=$_SESSION["email"];

		
if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) )
{
   if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "candupload/" . $_FILES["file"]["name"]);
      }
	}
			$filepath=$_FILES["file"]["name"];
		$email = $_POST['email'];   
   $password= $_POST['password'];
   $firstname= $_POST['firstname'];   
 $lastname= $_POST['lastname'];
    $surname= $_POST['surname'];
   $fathersname= $_POST['fathersname'];   
 $gender= $_POST['gender'];
    $dateofbirth= $_POST['dateofbirth'];
   $postaladdress= $_POST['postaladdress'];   
 $permanentaddress= $_POST['permanentaddress'];
    $religion= $_POST['religion'];
   $country= $_POST['country'];   
	$q1= $_POST['q1'];
	$q2= $_POST['q2'];  
			/*echo " cuming from registration ";
			$email=$_SESSION["email"];
			$password=$_SESSION["password"];
			$firstname=$_SESSION["firstname"];
			$lastname=$_SESSION["lastname"];
			$surname=$_SESSION["surname"];
			$fathersname=$_SESSION["fathersname"];
			$gender=$_SESSION["gender"];
			$dateofbirth=$_SESSION["dateofbirth"];
			$postaladdress=$_SESSION["postaladdress"];
			$permanentaddress=$_SESSION["permanentaddress"];
			$religion=$_SESSION["religion"];
			$country=$_SESSION["country"];
			$q1=$_SESSION["q2"];
			$q2=$_SESSION["q2"];
			$filepath=$_SESSION["filepath"];
		*/
		
		
		  $sql = "UPDATE candidate SET email='$email' ,password='$password',firstname='$firstname',lastname='$lastname',surname='$surname',fathersname='$fathersname',gender='$gender',dateofbirth='$dateofbirth',postaladdress='$postaladdress',permanentaddress='$permanentaddress',religion='$religion',country='$country',q1='$q1',q2='$q2',picture='$filepath' where email='$idd'";
		 //echo $sql;
		if (!mysql_query($sql)) {
				echo "eror";
		}
		else
		{
			$_SESSION["email"]=$email;
			$_SESSION["password"]=$password;
			$_SESSION["firstname"]=$firstname;
			$_SESSION["lastname"]=$lastname;
			$_SESSION["surname"]=$surname;
			$_SESSION["fathersname"]=$fathersname;
			$_SESSION["gender"]=$gender;
			$_SESSION["dateofbirth"]=$dateofbirth;
			$_SESSION["postaladdress"]=$postaladdress;
			$_SESSION["permanentaddress"]=$permanentaddress;
			$_SESSION["religion"]=$religion;
			$_SESSION["country"]=$country;
			$_SESSION["q2"]=$q1;
			$_SESSION["q2"]=$q2;
			$_SESSION["filepath"]=$filepath;
			
			
			
	
		}
		
		
		
		
	}
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
			<span style="color:white"> <h2 align="right" style="color:black">Welcome : <?PHP echo $_SESSION["firstname"]; ?></h2></span>
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
          
        <?PHP 
		if(isset($_SESSION["email"])){
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
			 <form action="" method="post"
enctype="multipart/form-data">
				<table>
				<caption><h1><span>Candidate Profile</span></h1>
				<a href='candidate_Resume.php?email=<?PHP  echo $_SESSION["email"] ?>'>Print Resume</a>
				
				
				<tr>
					<td> Email&nbsp;:&nbsp;</td>
					<td> 
						<input type="email" class="text" name="email" placeholder="Write Email Here"       value="<?PHP if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>" />					</td>
				</tr>
				<tr>
					<td> Picture :&nbsp;</td>
					<td> 
						<input type="file" class="text" name="file" id="file" placeholder=""    value="<?PHP if(isset($_SESSION['filepath'])){echo $_SESSION['filepath'];}?>">
					
					</td>
				</tr>
				<tr>
					<td></td>
					
					<td><?php echo "<img src='candupload/".$_SESSION['filepath']."' width='60px' height='60px' />" ?></td>
				</tr>
			
				<tr>
					<td> Password&nbsp;:&nbsp;</td>
					<td> 
						<input type="Password" class="text" name="password" placeholder="Write password Here"   value="<?PHP if(isset($_SESSION['password'])){echo $_SESSION['password'];}?>">					</td>
				</tr>
				<tr>
					<td>First Name &nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="firstname"  value="<?PHP if(isset($_SESSION['firstname'])){echo $_SESSION['firstname'];}?>">					</td>
				</tr>	
				<tr>
					<td> Last Name&nbsp;:&nbsp;</td>
					<td>
						<input type="text" class="text" name="lastname"  value="<?PHP if(isset($_SESSION['lastname'])){echo $_SESSION['lastname'];}?>" />					</td>
				</tr>
				<tr>
					<td>Surname&nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="surname"  value="<?PHP if(isset($_SESSION['surname'])){echo $_SESSION['surname'];}?>">					</td>
				</tr>
				<tr>
					<td>Gender&nbsp;:&nbsp;</td>
					<td>
					
				<select id="gender" name="gender" class="text">
<option <?php if ($gender == "Select Gender" ) echo 'selected'; ?> value="1">Select Gender</option>
<option <?php if ($gender == "Male" ) echo 'selected'; ?> value="Male">Male</option>
<option <?php if ($gender == "Female" ) echo 'selected'; ?> value="Female">female</option>
</select>				</td>
				</tr>
					<td> Father/Husband Name &nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="fathersname"  value="<?PHP if(isset($_SESSION['fathersname'])){echo $_SESSION['fathersname'];}?>"/> </td>
				<tr>
					<td>Date of Birth&nbsp;:&nbsp;</td>
					<td><input type="Date" class="text" name="dateofbirth"  placeholder="Write DOB Here"   value="<?PHP if(isset($_SESSION['dateofbirth'])){echo $_SESSION['dateofbirth'];}?>"> </td>
				</tr>		
				<tr>
					<td>Postal Address&nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="postaladdress"  value="<?PHP if(isset($_SESSION['postaladdress'])){echo $_SESSION['postaladdress'];}?>"> </td>
				</tr>
				<tr>
					<td>Permanent Address&nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="permanentaddress"  value="<?PHP if(isset($_SESSION['permanentaddress'])){echo $_SESSION['permanentaddress'];}?>"> </td>
				</tr>
				<tr>
					<td>Religion&nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="religion" value="<?PHP if(isset($_SESSION['religion'])){echo $_SESSION['religion'];}?>"> </td>
				</tr>
				<tr>
					<td>Country &nbsp;:&nbsp;</td>
					<td>
					
					
						<select id="country"  class="text" name="country">
<option <?php if ($country == 1 ) echo 'selected'; ?> value="1">Select </option>
<option <?php if ($country == "Pakistan" ) echo 'selected'; ?> value="Pakistan">Pakistan</option>
<option <?php if ($country == "India" ) echo 'selected'; ?> value="India">India</option>
<option <?php if ($country == "Srilanka" ) echo 'selected'; ?> value="Srilanka">Srilanka</option>
<option <?php if ($country ==  "Bangladesh") echo 'selected'; ?> value="Bangladesh">Bangladesh</option>
<option <?php if ($country == "Pakistan" ) echo 'selected'; ?> value="United States">United States</option>
</select>					



</td>
				</tr>	
				
								</tr>
					<tr>	<td>
					 
					</td>
					<td>(What is Your Favourate Pet Name ?)<br />
					<input type="text" class="text" name="q1" required value="<?PHP if(isset($_SESSION['q1'])){echo $_SESSION['q1'];}?>" />
					</td>
				
				</tr>	
					<tr><td>						
					</td>
					<td>(What is Your Favourate Game ?)<br />
					<input type="text" class="text" name="q2" required value="<?PHP if(isset($_SESSION['q2'])){echo $_SESSION['q2'];}?>" />
					</td>

					
				</tr>
				
				
				
				
				<tr>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td><input type="Submit" class="btnSubmit" name="Submit" class="btnSubmit"  value="update"/> </td>
				</tr>
			</table>
			</form>
          <div class="clr"></div>
        </div>
        <div class="article">
          
        </div>
      </div>
      <div class="sidebar">
        <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		 <h2 class="star"><span>My Account</span></h2>
				
            <li>
			<img src="images/images.png" style="width: 21px;" />
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
			?>
			</a></li>
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
