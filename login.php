 /*<?PHP
session_start();
$_SESSION['a_username'] = ""; 
$_SESSION['StudentID']= "";
$_SESSION["FullName"]= "";
$_SESSION["FatherName"]= "";
$_SESSION["SurName"] = "";
$_SESSION["Sex"] = "";
$_SESSION["Nationality"]= "";
$_SESSION["NicNumber"] = "";
$_SESSION["ContactNo"] = "";
$_SESSION["EmailAddress"]= "";  // email Address
$_SESSION["HomeAddress"] = "";
$_SESSION["EnrollmentNo"] = "";
$_SESSION["RollNumber"] = "";
$_SESSION["Department"] = "";
$_SESSION["Center"] = "";
$_SESSION["Batch"] = "";
//$_SESSION["Active"] = $row['Active'];
$_SESSION["StudentPicture"] ="";
?>   */

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script language="javascript">
$(document).ready(function()
{



	$("#login_form").submit(function()
	{
	
		//remove all the class add the messagebox classes and start fading
		$("#msgbox").removeClass().addClass('messagebox').text('Validating....').fadeIn(1000);
		//check the username exists or not from ajax
		$.post("ajax_login.php",{ user_name:$('#username').val(),password:$('#password').val(),rand:Math.random() } ,function(data)
        {
		  if(data=='yes') //if correct login detail
		  {
		  	$("#msgbox").fadeTo(200,0.1,function()  //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Logging in.....').addClass('messageboxok').fadeTo(900,1,
              function()
			  { 
			  	 //redirect to secure page
				 document.location='examsinfo.php';
			  });
			  
			});
		  }
		  else 
		  {
		  	$("#msgbox").fadeTo(200,0.1,function() //start fading the messagebox
			{ 
			  //add message and change the class of the box and start fading
			  $(this).html('Username & password entered is incorrect').addClass('messageboxerror').fadeTo(900,1);
			});		
          }
				
        });
 		return false; //not to post the  form physically
	});
	//now call the ajax also focus move from 
	$("#password").blur(function()
	{
		$("#login_form").trigger('submit');
	});
});
</script>

<script>
  function startBlink(){
    window.blinker = setInterval(function(){
    	if(window.blink){
    	   $('.blink').css('color','red');
    	   window.blink=false;
    	 }
    	else{
    		$('.blink').css('color','white');
    		window.blink = true;
    	}
    },800);
  }

  function stopBlink(){
    if(window.blinker) clearInterval(window.blinker);
  } 
</script>
</head>
	
<body onLoad="startBlink()">

<!--whole-body-->





<div id="main-wrapper">

<div id="top_content_box">
  <div id="top_content_inner">
    <div id="inner_left">
    <h1 style="margin-bottom:10px;" class="box_heding2">Please Login First
	<Label name="examsforthe" style="font-style:italic; float:right; color:red;">
	<div >
	<span style="width:25; height:auto;">
	<img src="images/New_Blink_3.gif" style="width:25; height:auto;" />	
	</span>
	<span class="blink">




</span> 
	
	</div>
	
	</Label>
	</h1>
	
	
   <p style="font-size:20px; font-weight:200pt; font-family:Arial, Helvetica, sans-serif;"> Login Form </p>
<p style="font-family:Arial, Helvetica, sans-serif;">Please login with your email and password</p><br />

 <form method="post" action="" id="login_form">

<label>Seat/Roll Number <b style="color:red">*</b></label><br />

<input name="username" type="text" id="username" class="large" required style="z-index:50;position: relative; -moz-border-radius:6px;-webkit-border-radius:6px;border-radius:6px;width:550px;height:30px; border-right:solid black 1px; border-top:solid black 1px; border-bottom:solid black 1px; width:400px;" placeholder="eg: 13BM01" id="inputSearch" />

<p style="font-size: 12px;color: #ADB3B9;">
Please make sure this is valid Roll Number Like <b>13BM01</b> <br>
If you don’t have a valid Roll Number, then contact with your respective department.  </p><br />

<label>Password <b style="color:red">*</b></label><br />

<input name="password" type="password" id="password" required 
style="z-index:50;position: relative; -moz-border-radius:6px;-webkit-border-radius:6px; border-radius:6px;width:550px;height:30px; border-right:solid black 1px; border-top:solid black 1px; border-bottom:solid black 1px; width:400px;" placeholder="eg: @Y1SA*bRohI!" id="inputSearch" />

<p style="font-size: 12px;color: #ADB3B9;">Please make sure the password is case-sensetive</p><br />


<div class="buttondiv">
	<input class="button green"   name="submit" id="submit"  value="Login" type="Submit"></input> | <a href="#" style="text-decoration:none;" >Forget password ?</a> 
	<span id="msgbox" style="display:none">
	</span>
</div>

  
 
</form>
 </div>
	 
    <div id="inner_right">

      <h1 style="margin-bottom:10px;" class="box_heding">Attention Note !</h1>

		<p style="padding-left:10px; ">
		
		<b style="color:Green;">Are You Eligible For <br/>Examination Registration ?</b><br /><br />
		1. You must have to receive your <b>Password</b> from your <b>Departments</b> respectively ?</br> <br/>
		2. You must have your own Email address</br><br />
		3. Now you are authorized for login.<br/><br />

		
		All the students are informed that, use MUET  <b>Online Exams</b> Registration System.
		It will facilitiate you to keep track records of your all appered exams and there results</li>
		
 </p>
	

	
    </div>
    <div class="clear-me"></div>
	
  </div>


</div>
			

 <br />
	
 	 <div class="clear-me"></div>	
</div>
 

  </body>
  </html>
