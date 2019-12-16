<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) )
{
   
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

 
     
   $sql="INSERT INTO `candidate`(`email`, `password`, `firstname`, `lastname`, `surname`, `fathersname`, `gender`, `dateofbirth`, `postaladdress`, `permanentaddress`, `religion`, `country`) VALUES ('$email','$password','$firstname','$lastname','$surname','$fathersname','$gender','$dateofbirth','$postaladdress','$permanentaddress','$religion','$country')";

   
if (!mysql_query($sql)) {
  echo "user already Exist";
}
else
{
	isset($_POST["gender"]) ? $cgender = $_POST["gender"] : $cgender=1;
	isset($_POST["country"]) ? $ccountry = $_POST["country"] : $ccountry=1;
	
	
	
	$_SESSION["cgender"]=$cgender;
	$_SESSION["ccountry"]=$ccountry;
	echo $_SESSION["cgender"];
	echo $_SESSION["ccountry"];
	
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
	
	
	
	header('Location:candidate_profile.php');
	
}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Neoglobal</title>
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
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php"><span>Home</span></a></li>
          <li><a href="Register.php"><span>Register</span></a></li>
          <li><a href="Login.php"><span>Login</span></a></li>
          <li><a href="Jobs.php"><span>Jobs</span></a></li>
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
				<table>
				<caption><h1><span>Candidate Registration</span></h1></caption>
				<tr>
					<td colspan='4'>If You are already registered <a href='Login.php'>SignIn</a></td>
				</tr>
				<tr>
					<td> Email&nbsp;:&nbsp;</td>
					<td> 
						<input type="email" name="email" placeholder="Write Email Here" required  />
					</td>
				</tr>
				<tr>
					<td> Password&nbsp;:&nbsp;</td>
					<td> 
						<input type="Password" name="password" placeholder="Write password Here" required  />
					</td>
				</tr>
				<tr>
					<td>First Name &nbsp;:&nbsp;</td>
					<td><input type="text" name="firstname" /></td>
				</tr>	
				<tr>
					<td> Last Name&nbsp;:&nbsp;</td>
					<td>
						<input type="text" name="lastname" />
					</td>
				</tr>
				<tr>
					<td>Surname&nbsp;:&nbsp;</td>
					<td><input type="text" name="surname" /> </td>
				</tr>
				<tr>
					<td>Gender&nbsp;:&nbsp;</td>
					<td>
					<Select name="gender" required> 
						<option value="1">Select Gender</option>
						<option value="2">Male</option>
						<option value="3">female</option>
					</Select>
				</td>
				</tr>
					<td> Father/Husband Name &nbsp;:&nbsp;</td>
					<td><input type="text" name="fathersname" required /> </td>
				<tr>
					<td>Date of Birth&nbsp;:&nbsp;</td>
					<td><input type="Date" name="dateofbirth"  placeholder="Write DOB Here" required /> </td>
				</tr>		
				<tr>
					<td>Postal Address&nbsp;:&nbsp;</td>
					<td><input type="text" name="postaladdress" required/> </td>
				</tr>
				<tr>
					<td>Permanent Address&nbsp;:&nbsp;</td>
					<td><input type="text" name="permanentaddress" required/> </td>
				</tr>
				<tr>
					<td>Religion&nbsp;:&nbsp;</td>
					<td><input type="text" name="religion" required/> </td>
				</tr>
				<tr>
					<td>Country &nbsp;:&nbsp;</td>
					<td>
						<select name="country" required>
						<option value="1">Select Country</option>
								<option value="2">Pakistan </option>
								<option value="3">India </option>
								<option value="4">Srilanka </option>
								<option value="5">Bangladesh </option>
					
								
						</select>
					</td>
				</tr>	
				<tr>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td><input type="Submit" name="Submit"  /> </td>
				</tr>
			</table>
			</form>
          <div class="clr"></div>
        </div>
        <div class="article">
          
        </div>
        <p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
      </div>
      <div class="sidebar">
        <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		  <?php if(isset($_SESSION["email"]))
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
		
       
      </div>
      <div class="clr"></div>
    </div>
  </div>
	<?php include('footer.php') ?>
</div>
</body>
</html>
