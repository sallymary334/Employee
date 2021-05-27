<?php
class DBConnection
{
	private $con;
	function __construct()
	{
		$this->con=mysqli_connect(DB_HOST,DB_UN,DB_PWD);
		mysqli_select_db($this->con,DB_Name);
	}
	function runQuery($sql)
	{
		$res=mysqli_query($this->con,$sql);
		if($res==false)
		{
			return mysqli_error($this->con);
			//return false;
		}
		else
		{
			
			return $res;
		}
	}
}
?>