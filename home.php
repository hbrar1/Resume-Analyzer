<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();


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
        <h1><a href="#">Resume Analyzer</a></h1>
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
