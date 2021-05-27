<?php

	
	ob_start();
       
    require_once('config.inc.php');
	require_once('db.cls.php');
	require_once('db.inc.php');

	if(isset($_POST["emp_code"]))
	{
		session_start();

		$file_data = $_SESSION['file_data'];

		unset($_SESSION['file_data']);
 

		foreach($file_data as $row)
		{
	
			$data[] = '("'.$row[$_POST["emp_code"]].'",  "'.$row[$_POST["emp_name"]].'",'.$row[$_POST["dep"]].',"'.date("Y-m-d",strtotime($row[$_POST["dob"]])).'", "'.date("Y-m-d",strtotime($row[$_POST["doj"]])).'")';
			
		}

	if(isset($data))
	{
	
		$query = "INSERT INTO employeetab (EmpCode, EmpName, DepCode,DateOfBirth, DateOfJoin) 
		VALUES ".implode(",", $data)."";
		
		$statement=$db->runQuery($query);
 
		if($statement)
		{
			echo 'Data Imported Successfully';
		}
		else
		{
			echo 'Sorry Failed to Import Data <br>You have tried to add invalid data';
		}
	}
}


?>