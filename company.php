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



if (isset($_POST["cemail"]) && !empty($_POST["cemail"]) && isset($_POST["cpassword"]) && !empty($_POST["cpassword"]) )
{
	
	

	$id=$_SESSION['id'];
      $companyname= $_POST['companyname'];  
   $cemail = $_POST['cemail'];   
   $cpassword= $_POST['cpassword'];
 
    $companydescription= $_POST['companydescription'];
   $companycontact= $_POST['companycontact'];   
    $companyaddress= $_POST['companyaddress'];
	$q1= $_POST['q1'];
	$q2= $_POST['q2'];   
		
if ($_FILES["file"]["error"] > 0)
    {
    
    

	
	

   
$sql = "UPDATE company SET companyname='$companyname' ,companydescription='$companydescription',cemail='$cemail',cpassword='$cpassword',companycontact='$companycontact',companyaddress='$companyaddress',q1='$q1',q2='$q2' where companyid='$id'";


   //$sql="INSERT INTO `candidate`(`email`, `password`, `firstname`, `lastname`, `surname`, `fathersname`, `gender`, `dateofbirth`, `postaladdress`, `permanentaddress`, `religion`, `country`) VALUES ('$email','$password','$firstname','$lastname','$surname','$fathersname','$gender','$dateofbirth','$postaladdress','$permanentaddress','$religion','$country')";

   
if (!mysql_query($sql)) {
  echo "eror";
}
else{
	
	
	
	


	
	$_SESSION['companyname']=$companyname;
	$_SESSION['cemail']=$cemail;

	$_SESSION['companyaddress']=$companyaddress;
	$_SESSION['cpassword']=$cpassword;
	$_SESSION['companycontact']=$companycontact;
	$_SESSION['companydescription']=$companydescription;
	
	$_SESSION["q1"]=$q1;
	$_SESSION["q2"]=$q2;
	
	/*
	$id=mysql_insert_id();
	
	$_SESSION['id']=$id;
*/
}
}
else{
	
		 
	 
	 
 
	
if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("cupload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "cupload/" . $_FILES["file"]["name"]);
      }
	}
$filepath=$_FILES["file"]["name"];


   
$sql = "UPDATE company SET companyname='$companyname' ,companydescription='$companydescription',companylogo='$filepath',cemail='$cemail',cpassword='$cpassword',companycontact='$companycontact',companyaddress='$companyaddress' ,q1='$q1',q2='$q2' where companyid='$id'";


   //$sql="INSERT INTO `candidate`(`email`, `password`, `firstname`, `lastname`, `surname`, `fathersname`, `gender`, `dateofbirth`, `postaladdress`, `permanentaddress`, `religion`, `country`) VALUES ('$email','$password','$firstname','$lastname','$surname','$fathersname','$gender','$dateofbirth','$postaladdress','$permanentaddress','$religion','$country')";

   
if (!mysql_query($sql)) {
  echo "eror";
}
else{
	
	
	
	


	
	$_SESSION['companyname']=$companyname;
	$_SESSION['cemail']=$cemail;
	$_SESSION['companylogo']=$filepath;
	$_SESSION['companyaddress']=$companyaddress;
	$_SESSION['cpassword']=$cpassword;
	$_SESSION['companycontact']=$companycontact;
	$_SESSION['companydescription']=$companydescription;
	$_SESSION["q1"]=$q1;
	$_SESSION["q2"]=$q2;
	echo $_SESSION['companylogo'];
	
	/*
	$id=mysql_insert_id();
	
	$_SESSION['id']=$id;
*/
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
				<caption><h1><span>Company Profile</span></h1></caption>
				
				<tr>
					<td>Company Name &nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="companyname" required value="<?PHP if(isset($_SESSION['companyname'])){echo $_SESSION['companyname'];}?>"> 
					</td>
				</tr>	
				
				
				<tr>
					<td> Email&nbsp;:&nbsp;</td>
					<td> 
						<input type="email" class="text" name="cemail" placeholder="Write Email Here" required   value="<?PHP if(isset($_SESSION['cemail'])){echo $_SESSION['cemail'];}?>"> 
						
					</td>
				</tr>
				<tr>
					<td> Password&nbsp;:&nbsp;</td>
					<td> 
						<input type="Password" class="text" name="cpassword" placeholder="Write password Here" required   value="<?PHP if(isset($_SESSION['cpassword'])){echo $_SESSION['cpassword'];}?>"> 
						
					</td>
				</tr>
							
<tr>
					<td> Company logo :&nbsp;</td>
					<td> 
						<input type="file" class="text" name="file" id="file" placeholder=""    value="<?PHP if(isset($_SESSION['companylogo'])){echo $_SESSION['companylogo'];}?>">
					
					</td>
				</tr>
				
				
				<tr>
					<td></td>
					
					<td><?php echo "<img src='cupload/".$_SESSION['companylogo']."' width='30px' height='20px' />" ?></td>
				</tr>
			
				
				
				<tr>
					<td> Company Description &nbsp;:&nbsp;</td>
					<td>
						<input type="text" class="text" name="companydescription" required value="<?PHP if(isset($_SESSION['companydescription'])){echo $_SESSION['companydescription'];}?>"> 
						
					</td>
				</tr>
				<tr>
					<td>Company Contact&nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="companycontact" required value="<?PHP if(isset($_SESSION['companycontact'])){echo $_SESSION['companycontact'];}?>"> 
					</td>
				</tr>
		
				<tr>
					<td> companyaddress &nbsp;:&nbsp;</td>
					<td><input type="text" class="text" name="companyaddress" required value="<?PHP if(isset($_SESSION['companyaddress'])){echo $_SESSION['companyaddress'];}?>"> 
					</td>
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
					<td><input type="Submit" class="btnSubmit" name="Submit" value="Update"/> </td>
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
