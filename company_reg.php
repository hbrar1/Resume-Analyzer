<?php
ob_start();
session_start();
include ('php/database.php');
$con = db_connect();
if (isset($_POST["cemail"]) && !empty($_POST["cemail"]) && isset($_POST["cpassword"]) && !empty($_POST["cpassword"]) )
{
	
	$cemail = $_POST['cemail']; 
	
	 $email= mysql_real_escape_string($cemail);
    $query = "SELECT * FROM company WHERE cemail= '$cemail' ";
	
	
	  $result = mysql_query($query);
     
    if(mysql_num_rows($result) == 0) // User not found. So, redirect to login_form again.
    {

	
if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 8024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      }
	}
$filepath=$_FILES["file"]["name"];
	
	
	
      $companyname= $_POST['companyname'];  
   $cemail = $_POST['cemail'];   
   $cpassword= $_POST['cpassword'];
 
 $companylogo= $_POST['companylogo'];
    $companydescription= $_POST['companydescription'];
   $companycontact= $_POST['companycontact'];   
 $companyaddress= $_POST['companyaddress'];
   $q1= $_POST['q1'];
	$q2= $_POST['q1'];   
 

 $sql="INSERT INTO `company`( `companyname`, `companylogo`, `companydescription`, `cemail`, `cpassword`, `companycontact`, `companyaddress`,`q1`,`q2`) VALUES ('$companyname','$filepath','$companydescription','$cemail','$cpassword','$companycontact','$companyaddress','$q1','$q2')";
    echo $sql;
   //$sql="INSERT INTO `candidate`(`email`, `password`, `firstname`, `lastname`, `surname`, `fathersname`, `gender`, `dateofbirth`, `postaladdress`, `permanentaddress`, `religion`, `country`) VALUES ('$email','$password','$firstname','$lastname','$surname','$fathersname','$gender','$dateofbirth','$postaladdress','$permanentaddress','$religion','$country')";

   
if (!mysql_query($sql)) {
  echo "eror";
}
else
{
	

	
	$id=mysql_insert_id();
	
	$_SESSION['companyname']=$companyname;
	$_SESSION['cemail']=$cemail;
	$_SESSION['companylogo']=$filepath;
	$_SESSION['companyaddress']=$companyaddress;
	
	$_SESSION['cpassword']=$cpassword;
	$_SESSION['companycontact']=$companycontact;
	$_SESSION['companydescription']=$companydescription;
	$_SESSION['id']=$id;
	$_SESSION["q1"]=$q1;
	$_SESSION["q2"]=$q2;
header('Location:positionAnnoucement.php');







}

    }
   else{
	   
	   
	   
	   echo "User with the following email already exist";
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
<script>
function validateEmail($email){
	
	var emailReg = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	var valid = emailReg.test($email.value);

	if(!valid) {
             alert("Email is not correct format return false.");
			 document.getElementById("email").style.color ="red";
			 document.getElementById("email").style.border ="solid 1px red";
    } 
	else
	{
		document.getElementById("email").style.color ="black";
			 document.getElementById("email").style.border ="solid 1px skyblue";
		
	}
}

</script>

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
				echo '<span id="mes1">'.$Regcomment_count.'</span>';
				}
			?>
			</a>
		 </li>
		 
		 <?PHP 
		if(isset($_SESSION["email"]))
		{
		?>
			<li><a href="candidate_panel.php"><span>My Account</span></a>
			<span style="color:white">Welcome : <?PHP echo $_SESSION["email"]; ?></span>  
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
			<form action="" method="post"
enctype="multipart/form-data">
				<table>
				<caption><h1><span>Company Registration</span></h1></caption>
				<tr>
					<td colspan='4'>If You are already registered <a href='company_login.php'>SignIn</a></td>
				</tr>
				<tr>
					<td>Company Name &nbsp;:&nbsp;</td>
					<td><input type="text" name="companyname" required > 
					</td>
					</td><td style="color:red;"> ** </td>
				</tr>	
				
				
				<tr>
					<td> Email&nbsp;:&nbsp;</td>
					<td> 
						<input type="email" onblur="validateEmail(this);" id="email" name="cemail" placeholder="Write Email Here" required> 
						
					</td>
					</td><td style="color:red;"> ** </td>
				</tr>
				<tr>
					<td> Password&nbsp;:&nbsp;</td>
					<td> 
						<input type="Password" name="cpassword" placeholder="Write password Here" required   > 
						
					</td>
					</td><td style="color:red;"> ** </td>
				</tr>
							
<tr>
					<td> Company logo :&nbsp;</td>
					<td> 
						<input type="file" name="file" id="file" placeholder="" required   >
					</td>
					</td><td style="color:red;"> ** </td>
				</tr>
				<tr>
					<td> Company Desc &nbsp;:&nbsp;</td>
					<td>
						<input type="text" name="companydescription" required > 
						
					</td>
				</td><td style="color:red;"> ** </td>
				</tr>
				<tr>
					<td>Company Contact&nbsp;:&nbsp;</td>
					<td><input type="text" name="companycontact" required > 
					</td>
				</td><td style="color:red;"> ** </td>
				</tr>
		
				<tr>
					<td> Company Address &nbsp;:&nbsp;</td>
					<td><input type="text" name="companyaddress" required > 
					</td>
					</td><td style="color:red;"> ** </td>
					</tr>
				
				
				<tr>
					<td></td>
					<td>
						Security Question -1 (What is Your Favourite Pet Name ?) <br />
						<input type="text" class="text" name="q1" required/> </td>
					
					
					
				</tr>	
<tr>
					<td> 
					</td>
					
						<td>Security Question -2 (What is Your Favourite Game ?) <br />
					<input type="text" class="text" name="q2" required/></td>
				
					
					
				</tr>	
				
				
				
				
				
				
				
				
				<tr>
					<td>&nbsp;&nbsp;&nbsp;</td>
					<td><input type="Submit" name="Submit" /> </td>
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
