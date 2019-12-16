<?php

function db_connect()
{
                       $username="root";$password="";$database="resumeanalyzer";
                       $con=mysql_connect("localhost",$username,$password);
                        @mysql_select_db($database) or die( "Unable to select database");


if (!$con) {
  die('Could not connect: ' . mysql_error());
}
else
{

	
	
}

}

?> 