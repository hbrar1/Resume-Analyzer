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
$cid=$_SESSION["id"];

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
        <div class="article" style="margin-bottom:40px;">
          <h2><span>JOBS</span></h2>
		  	 <form method="post" >
				<table name="files">
					<tr>

						<th>Title</th>
						<th>Desc</th>
						<th>No.Of Vacancies</th>
						<th>Addvertize</th>
						<th> Applied Candidates </th>
						<th> Job Active</th>	
					</tr>
		
		
		<?php
					$result = mysql_query("SELECT * FROM positionannouncement where companyid='$cid'");
					while($row = mysql_fetch_array($result))
					{
							echo "<tr>";
							echo "<td>".$row[1] ."</td>";
							echo "<td>".$row[2]."</td>";
					    	echo "<td>".$row[5]."</td>";
			                echo "<td><a href='cupload/".$row[3]."'><img src='cupload/".$row[3]."' width='30px' height='20px' /></a></td>";
			                echo "<td><a href=comp_view_candidates.php?id=".$row[0].  ">View Candidates</a></td>";
                            echo "<td>".$row[16]."</td></tr>";
                          
                    }

?>
		 
</table>

			</form>
		  
	
          <div class="clr"></div>
        </div>
      
      </div>
      <div class="sidebar">
       
		 <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		  <h2 class="star"><span>My Account</span></h2>
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
