<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();

$email="";
$password="";
 
   if (isset($_POST["q1"]) && !empty($_POST["q2"]) && isset($_POST["q1"]) && !empty($_POST["q2"]) )
{
  $email= $_POST['email'];
    $q1= $_POST['q1'];
   $q2= $_POST['q2'];   
   
   
    $query = "SELECT * FROM company WHERE q1= '$q1' and q2='$q2' and cemail='$email' ";
     //echo $query;
    $result = mysql_query($query);
     
    if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
    {

		$eror=1;

    }
   else{ 
   
   
   while($row = mysql_fetch_array($result))
{

   
	$password=$row['cpassword'];
	
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
        <div class="article" style="padding-left:140px;">   <div class="clr"></div> <br />
         <caption><h1><span >Forget Password</span></h1></caption>
			 <form method="post" action="" id="login_form">
				<table>				
				<td > <a href='candidate_login.php'>Sign In</a></td>
							</tr>
							
							
					<tr>
					
					
						<td>Email Address<br /><input class="text" type="text" name="email" required value=""> </td>
				
					
					
				</tr>			
					<tr>
					
						<td>Security Question -1 (What is Your Favourate Pet Name ?)<br />
						<input type="text"  class="text" name="q1" required value=""> 
						</td>
					
					
					
				</tr>	
					<tr>
					
						<td>Security Question -2 (What is Your Favourate Game ?)<br />
						<input type="text" class="text" name="q2" required value=""> 
						</td>
					
					
					
				</tr>
				
				
					</tr>	
					<tr>
					
				
						<td><input type="submit" class="btnSubmit" value="Get"></td>
					
					
					
				</tr>
				</table>
				<div>
				<?php
				if(!empty($password)  )
				{
					
					echo "<h1>Your Password Is:  ".$password."</h1>";
					
				}
				if(!empty($eror))
				{
						echo "<h1>Please Provide Correct data</h1>";
				}
				
				?>
				
				</div>
				


	<span id="msgbox" style="display:none">
	</span>


  
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
		  <?php if(isset($_SESSION["user"]))
		{
		?>
            <li><a href="index.php">Home</a></li>
            <li><a href="accountsettings.php">Account Settings</a></li>
            <li><a href="accademicprofile.php">Academic Profile </a></li>
            <li><a href="jobhistory.php">Job History</a></li>
            <li><a href="favouritejobs.php">Favourites Jobs</a></li>
            <li><a href="logout.php">Logout</a></li>
			<?php
		}
		?>
          </ul>
        </div>
		
       
        <div class="gadget">
          <h2 class="star"><span>Logins/Registrations  </span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
		     <li><a href="candidate_login.php">Candidate Login</a><br />
              Login As A Candidate</li>
            <li><a href="company_login.php">Company Login</a><br />
              Login as A Company</li>
            <li><a href="register.php">Candidate Registration</a><br />
               Register A Candidate</li>
            <li><a href="company_reg.php">Company Registration</a><br />
              Register A Company</li>
         
         
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
