<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();

$email="";
$password="";
 


 if (isset($_SESSION["pid"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]))
{
	

		
    $email= $_POST['email'];
   $password= $_POST['password'];   
   
    $email= mysql_real_escape_string($email);
    $query = "SELECT * FROM candidate WHERE email= '$email' and password='$password' ";
     echo $query;
    $result = mysql_query($query);
     
    if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
    {

echo "not found";

    }
   else
   
   {
	   
	   

while($row = mysql_fetch_array($result))
{

    $_SESSION["email"]=$row['email'];
	$_SESSION["password"]=$row['password'];
	$_SESSION["firstname"]=$row['firstname'];
	$_SESSION["lastname"]=$row['lastname'];
	$_SESSION["surname"]=$row['surname'];
	$_SESSION["fathersname"]=$row['fathersname'];
	$_SESSION["gender"]=$row['gender'];
	$_SESSION["dateofbirth"]=$row['dateofbirth'];
	$_SESSION["postaladdress"]=$row['postaladdress'];
	$_SESSION["permanentaddress"]=$row['permanentaddress'];
	$_SESSION["religion"]=$row['religion'];
	$_SESSION["country"]=$row['country'];
	$_SESSION["q1"]=$row['q1'];
	$_SESSION["q2"]=$row['q2'];
	$_SESSION["filepath"]=$row['picture'];
}

    $query = "SELECT * FROM candidateexperience where `candidateexperience`.`candidateemail`= '$email' "; 
    $result = mysql_query($query);     	
while($row = mysql_fetch_array($result))
{
	 
    $_SESSION['candidateExprnce']=$row['candidateExprnce'];
	$_SESSION["email"]=$row['candidateemail'];
	$_SESSION['Employer']=$row['employer'];
	$_SESSION['emplocation']=$row['employerlocation'];
	$_SESSION['dos']=$row['datestart'];
	$_SESSION['Dsg']=$row['dateend'];
	$_SESSION['doe']=$row['designation'];
}
	 $query = "SELECT * FROM  candidateeducation where candidateeducation.`candidateemail`= '$email' "; 
    $result = mysql_query($query); 
	while($row = mysql_fetch_array($result))
{

   	$_SESSION['degreename']=$row['degreename'];
	$_SESSION['dateofadmission']=$row['dateofadmission'];
	$_SESSION['dateofpassing']=$row['dateofpassing'];
	$_SESSION['percentate']=$row['percentate'];
	$_SESSION['division']=$row['division'];
	$_SESSION['specialization']=$row['specialization'];
}
	 $query = "SELECT * FROM  candidateachievement where candidateachievement.`candidateemail`= '$email' "; 
    $result = mysql_query($query); 
	while($row = mysql_fetch_array($result))
{


	$_SESSION['candidiateAch']=$row['candidiateAch'];
	$_SESSION['achievementtitle']=$row['achievementtitle'];
	$_SESSION['achivemnetdate']=$row['achivemnetdate'];
	$_SESSION['canremarks']=$row['canremarks'];
}
$query = "SELECT * FROM  candidatecertification where candidatecertification.`candidateemail`= '$email' "; 
    $result = mysql_query($query); 
	while($row = mysql_fetch_array($result))
{


$_SESSION['candidateCertificate']=$row['candidateCertificate'];
	$_SESSION['certificationdate']=$row['certificationdate'];
	$_SESSION['certificationtitle']=$row['certificationtitle'];
	$_SESSION['remarks']=$row['remarks'];
	
}
	   
	   // Redirect to home page after successful login.
   echo "in";
   header('Location:applyjob.php');

   
   }}
		
 
 
 
 
 
 
 
 
 
 
 
 
   if (empty($_SESSION["pid"]) && isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["password"]) )
{
  
    $email= $_POST['email'];
   $password= $_POST['password'];   
   
    $email= mysql_real_escape_string($email);
    $query = "SELECT * FROM candidate WHERE email= '$email' and password='$password' ";
     
    $result = mysql_query($query);
     
    if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
    {



    }
   else{ // Redirect to home page after successful login.
   
   
   	
while($row = mysql_fetch_array($result))
{

    $_SESSION["email"]=$row['email'];
	$_SESSION["password"]=$row['password'];
	$_SESSION["firstname"]=$row['firstname'];
	$_SESSION["lastname"]=$row['lastname'];
	$_SESSION["surname"]=$row['surname'];
	$_SESSION["fathersname"]=$row['fathersname'];
	$_SESSION["gender"]=$row['gender'];
	$_SESSION["dateofbirth"]=$row['dateofbirth'];
	$_SESSION["postaladdress"]=$row['postaladdress'];
	$_SESSION["permanentaddress"]=$row['permanentaddress'];
	$_SESSION["religion"]=$row['religion'];
	$_SESSION["country"]=$row['country'];
}

    $query = "SELECT * FROM candidateexperience where `candidateexperience`.`candidateemail`= '$email' "; 
    $result = mysql_query($query);     	
while($row = mysql_fetch_array($result))
{
	 
    $_SESSION['candidateExprnce']=$row['candidateExprnce'];
	$_SESSION["email"]=$row['candidateemail'];
	$_SESSION['Employer']=$row['employer'];
	$_SESSION['emplocation']=$row['employerlocation'];
	$_SESSION['dos']=$row['datestart'];
	$_SESSION['Dsg']=$row['dateend'];
	$_SESSION['doe']=$row['designation'];
}
	 $query = "SELECT * FROM  candidateeducation where candidateeducation.`candidateemail`= '$email' "; 
    $result = mysql_query($query); 
	while($row = mysql_fetch_array($result))
{

   	$_SESSION['degreename']=$row['degreename'];
	$_SESSION['dateofadmission']=$row['dateofadmission'];
	$_SESSION['dateofpassing']=$row['dateofpassing'];
	$_SESSION['percentate']=$row['percentate'];
	$_SESSION['division']=$row['division'];
	$_SESSION['specialization']=$row['specialization'];
}
	 $query = "SELECT * FROM  candidateachievement where candidateachievement.`candidateemail`= '$email' "; 
    $result = mysql_query($query); 
	while($row = mysql_fetch_array($result))
{


	$_SESSION['candidiateAch']=$row['candidiateAch'];
	$_SESSION['achievementtitle']=$row['achievementtitle'];
	$_SESSION['achivemnetdate']=$row['achivemnetdate'];
	$_SESSION['canremarks']=$row['canremarks'];
}
$query = "SELECT * FROM  candidatecertification where candidatecertification.`candidateemail`= '$email' "; 
    $result = mysql_query($query); 
	while($row = mysql_fetch_array($result))
{


$_SESSION['candidateCertificate']=$row['candidateCertificate'];
	$_SESSION['certificationdate']=$row['certificationdate'];
	$_SESSION['certificationtitle']=$row['certificationtitle'];
	$_SESSION['remarks']=$row['remarks'];
	
}
	

   // session_regenerate_id();


    session_write_close();
    header('Location: candidate_panel.php');
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
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php"><span>Home</span></a></li>
          <li><a href="Register.php"><span>Register</span></a></li>
          <li><a href="candidate_login.php"><span>Login</span></a></li>
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
        <div class="article" style="padding-left:140px;">   <div class="clr"></div> <br />
         <caption><h1><span >Candidate Login</span></h1></caption>
			 <form method="post" action="" id="login_form">
				<table>				
				<td colspan='2'> <a href='register.php'>Signup</a></td>
				<tr>
					<td> Email&nbsp;:&nbsp;</td>
					<td> 
						<input type="email" class="text" name="email" id="email" placeholder="Write Email Here" required  />
					</td>
				</tr>
				<tr>
					<td> Password&nbsp;:&nbsp;</td>
					<td> 
						<input type="Password" class="text" name="password"  id="password" placeholder="Write password Here" required  />
					</td>
				</tr>
				<tr>
				<td>&nbsp;&nbsp;&nbsp;</td>
					<td><input class="btnSubmit"   name="submit" id="submit"  value="Login" type="Submit"></input> | <a href="candidate_forget.php" style="text-decoration:none;" >Forget password ?</a> 
	
				</td>
				</tr>
				</table>
				
				


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
