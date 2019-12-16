<?php session_start();
 error_reporting(E_ERROR | E_WARNING | E_PARSE);
	include 'config.php';
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	$un=mysql_real_escape_string(strip_tags(trim($_POST['member_id'])));
	$up=mysql_real_escape_string(strip_tags(trim($_POST['password'])));
	if(($un == "" ) && ($up == "" ))
	{
		header('Location:login.php?mess='.urlencode('Please enter value for Username and Password.'));
		exit;		
	}
	else if (($un == "" )) 
	{
		header('Location:login.php?mess='.urlencode('Please enter valid Username.'));
		exit;
	}
	else if(($up == "" )) 
	{
		header('Location:login.php?mess='.urlencode('Please enter valid Password.'));
		exit;
	}
	else
	{	
		$sql='select * from tbl_user where u_login like "'.$un.'" and u_password like "'.md5($up).'" and u_active=1';
		$result=mysql_query($sql);
		if(mysql_num_rows($result)==0)
		{
			header('Location:login.php?mess='.urlencode('Sorry! Invalid Username or Password. Try again.'));
			exit;		
		}
		else
		{
			$sql_email='select * from tbl_user where u_login like "'.$un.'"';
			$result1=mysql_query($sql_email);
			$rs=mysql_fetch_array($result1);

			$user_code=$rs['u_code'];
			$uid=$rs['id'];
			//echo "the user code is ".$user_code;
			$u_login=$rs['u_login'];
	         
			$_SESSION['user_code'] =$user_code;			
			$_SESSION['member_id'] =$u_login ;
			$_SESSION['member_fullname']=$rs['u_fname']."&nbsp;".$rs['u_lname'];
			
				if($_SESSION['id'] == "")
				{
					
				$hold_session = $_SESSION['id'];

			print "<meta http-equiv=\"refresh\" content=\"5; url=index.php\">" ;
			echo('<br><br><div align=center><img src=images/ajax-loader1.gif></div><br><br><br>');
			echo('<font size=2 face=verdana color=#906E27><center>Your authentication succeeded.<br>Now you will be forwarded to admin panel automatically. If your browser does not support this porperty please <a href=index.php class="left">click here</a></center></font>');
			
				}
				else
				{				
					$hold_session = $_SESSION['id'];
					mysql_query("update tbl_order set user_code = '$user_code' where order_id ='$hold_session'");		
					print "<meta http-equiv=\"refresh\" content=\"2; url=cart.php\">" ;
			echo('<br><br><div align=center><img src=images/ajax-loader1.gif></div><br><br><br>');
			echo('<font size=2 face=verdana color=#906E27><center>Your authentication succeeded.<br>Now you will be forwarded to admin panel automatically. If your browser does not support this porperty please <a href=index.php class="left">click here</a></center></font>');				
				}
			
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>...::NHSDN::...</title>
</head>
<body>
</body>
</html>
