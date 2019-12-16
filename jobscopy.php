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
<style>

table {
  width: 100%;
  margin: 0;
  border-top: 1px solid #e4e2e8;
  border-collapse: collapse;
}

th {
  text-align: left;
  color: white;
  background-color: #72d3ee;
font-size: 1.25em;
}

th, td {
  border-color: silver;
  border-width: 0 1px 1px 1px;
  border-style: solid;
  padding: 0.25em 0.5em; 

}

td { font-size: .75em; }

/* See Lea Verou's explanation background-attachment:
 * http://lea.verou.me/2012/04/background-attachment-local/
 */
.widetable {
  overflow-x: auto;
   overflow-y: auto;
  background-image: -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, #ffffff), color-stop(100%, rgba(255, 255, 255, 0))), -webkit-gradient(linear, 100% 50%, 0% 50%, color-stop(0%, #ffffff), color-stop(100%, rgba(255, 255, 255, 0))), -webkit-gradient(linear, 0% 50%, 100% 50%, color-stop(0%, #c3c3c5), color-stop(100%, rgba(195, 195, 197, 0))), -webkit-gradient(linear, 100% 50%, 0% 50%, color-stop(0%, #c3c3c5), color-stop(100%, rgba(195, 195, 197, 0)));
  background-image: -webkit-linear-gradient(left, #ffffff, rgba(255, 255, 255, 0)), -webkit-linear-gradient(right, #ffffff, rgba(255, 255, 255, 0)), -webkit-linear-gradient(left, #c3c3c5, rgba(195, 195, 197, 0)), -webkit-linear-gradient(right, #c3c3c5, rgba(195, 195, 197, 0));
  background-image: -moz-linear-gradient(left, #ffffff, rgba(255, 255, 255, 0)), -moz-linear-gradient(right, #ffffff, rgba(255, 255, 255, 0)), -moz-linear-gradient(left, #c3c3c5, rgba(195, 195, 197, 0)), -moz-linear-gradient(right, #c3c3c5, rgba(195, 195, 197, 0));
  background-image: -o-linear-gradient(left, #ffffff, rgba(255, 255, 255, 0)), -o-linear-gradient(right, #ffffff, rgba(255, 255, 255, 0)), -o-linear-gradient(left, #c3c3c5, rgba(195, 195, 197, 0)), -o-linear-gradient(right, #c3c3c5, rgba(195, 195, 197, 0));
  background-image: linear-gradient(left, #ffffff, rgba(255, 255, 255, 0)), linear-gradient(right, #ffffff, rgba(255, 255, 255, 0)), linear-gradient(left, #c3c3c5, rgba(195, 195, 197, 0)), linear-gradient(right, #c3c3c5, rgba(195, 195, 197, 0));
  background-position: 0 0, 100% 0, 0 0, 100% 0;
  background-repeat: no-repeat;
  background-color: white;
  background-size: 4em 100%, 4em 100%, 1em 100%, 1em 100%;
  background-attachment: local, local, scroll, scroll; 
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
         <form method="post" >
				<table name="files">
					<tr>

						<th>Title</th>
						<th>Desc</th>
						<th>No.OfVacancies</th>
						<th>Add</th>
						<th> Details </th>
						<th> Apply</th>	
					</tr>
		
		
		<?php
					$result = mysql_query("SELECT * FROM positionannouncement");
					while($row = mysql_fetch_array($result))
					{
							echo "<tr>";
							echo "<td>".$row[1] ."</td>";
							echo "<td>".$row[2]."</td>";
					    	echo "<td>".$row[5]."</td>";
			                echo "<td><img src='cupload/".$row[3]."' width='30px' height='20px' /></td>";
			                echo "<td><a href=jobdetails.php?id=".$row[0].  ">Details</a></td>";
                            echo "<td><a href=applyjob.php?id=".$row[0]. ">Apply</a></td>";
                            echo "<br>";
                    }

?>
		 
</table>

			</form>
		 
        </div>
      </div>
      <div class="sidebar">
        <div class="gadget">
		
          <div class="clr"></div>
          <ul class="sb_menu">
		  <h2 class="star"><span>My Account</span></h2>
		  <?php if(isset($_SESSION["email"]))
		{
		?>
           <li><a href="candidate_panel.php">DASHBOARD</a></li>
		     <li><a href="jobs.php">Jobs</a></li>
            <li><a href="candidate_profile.php">Candidate Profile</a></li>
            <li><a href="education.php">Academic Profile</a></li>
			<li><a href="Experience.php">Experience</a></li>
			<li><a href="achievements.php">Achievement</a></li>
			<li><a href="certification.php">Certification </a></li>
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
