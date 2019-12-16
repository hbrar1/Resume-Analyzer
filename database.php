<?php

function db_connect()
{
                       $username="root";$password="admin";$database="resumeanalyzer";
                       $con=mysqli_connect("localhost",$username,$password,$database);
                        @mysqli_select_db($database) or die( "Unable to select database");


if (!$con) {
  die('Could not connect: ' . mysql_error());
}

}

?> 