<?php
class DB {	
	//var $db_host = "localhost";
	//var $db_name = "publicat_muetexams";
	//var $db_user = "publicat_dbuser";
	//var $db_password = "S2KgFFgSeDuq";
	
	var $db_host = "localhost";
	var $db_name = "resumeanalyzer";
	var $db_user = "root";
	var $db_password = "";
	var $db;
	
	
	

	function DB()
	{
		
	}
	
	function open()
	{
		$this->db = mysqli_connect($this->db_host, $this->db_user, $this->db_password);
		$this->_db_error();
		mysqli_select_db($this->db,$this->db_name);
		
	}

	function close()
	{
		mysqli_close($this->db);
	}

	function _db_error()
	{
		if (mysqli_errno($this->db))
		{
			trigger_error("Database error: #" . mysqli_errno($this->db) . " - " . mysqli_error($this->db), E_USER_ERROR);					
		}
	}

	function execute_reader($cmd)
	{
		$result = array();
		$rs = mysqli_query($this->db,$cmd);
		$this->_db_error();
		$i = 0;
		while ($row = mysqli_fetch_object($rs))
		{
			$result[$i] = $row;
			$i++;
		}
		mysqli_free_result($rs);
		return $result;
	}

	function execute_non_query($cmd)
	{
		mysqli_query($this->db,$cmd);
		$this->_db_error();
		return true;
	}

	function execute_scalar($cmd)
	{
		$rs = mysqli_query($this->db,$cmd);
		$this->_db_error();
		if ($row = mysqli_fetch_array($rs))
		{
			$result = $row[0];
		}
		else
		{
			$result = null;
		}
		mysqli_free_result($rs);
		return $result;
	}

	function check_record($cmd)
	{
		$rs = mysqli_query($this->db,$cmd);
		$this->_db_error();
		if ($row = mysqli_fetch_array($rs))
		{
			$result = 1;
		}
		else
		{
			$result = null;
		}
		mysqli_free_result($rs);
		return $result;
	}

	function fetch_onerow($cmd)
	{
		$rs = mysqli_query($this->db,$cmd);
		$this->_db_error();	
		$result = mysqli_fetch_object($rs);
		mysqli_free_result($rs);
		return $result;
	}

	function cleanQuery($string)
	{
		$st ='';
		if(get_magic_quotes_gpc()) 
		{
			
			$string = stripslashes($string);
		}
		if (phpversion() >= '4.3.0')
		{
			$string = mysqli_real_escape_string($this->db,$string);
		}
		else
		{
			$string = mysqli_escape_string($string);
		}
		return $string;
	}

	function encode($name)
	{
		for( $a=1; $a<=2; $a++ )
		{
			$name=base64_encode($name);
			
			//for( $b=0; $b<=2; $b++ )
			//{
				//$name=base64_encode($name);
			//}
		}
		//$name = $name."@ImAs+";
		return $name;
	}

	function decode($name)
	{			
		for( $a=1; $a<=2; $a++ )
		{
			$name=base64_decode($name);
			//for( $b=0; $b<3; $b++ )
			//{
				//$name=base64_decode($name);
			//}
		}
		
		return $name;
	}
	
	
	
	
	// users function
	
	
}

?>