<!DOCTYPE html>
<html>
   <head>
     <title>Employee Management</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="http://code.jquery.com/jquery.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <style>
	  
		#tbstyle {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

#tbstyle td, #tbstyle th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbstyle tr:nth-child(even){background-color: #f2f2f2;}

#tbstyle tr:hover {background-color: #ddd;}

#tbstyle th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
      .table tbody tr th
      {
        min-width: 200px;
      }

      .table tbody tr td
      {
        min-width: 200px;
      }
	  th,td{
		  text-align:center;
		  cell-padding:5px;
		  cell-spacing:3px;
		  border-style:
		  
	  }

      </style>
   </head>
   <body>
    <div class="container">
     <br />
     <br />
      <!--<h1 align="center">Upload CSV File</h1>-->
	  <h2 align="center">Employee Details</h2>
      <br />
        <div id="message"></div>
      <div class="panel panel-default">
          <div class="panel-heading">
		  <h3 align="center">Click This Button To Add New Employee Details</h3>
            <!--<h3 class="panel-title">Select CSV File</h3>-->
          </div>
          <div class="panel-body">
		  
            <div class="row" id="upload_area">
			<div align="center">
				<a href="indeximport.php" class="btn btn-primary">CLICK</a>
			</div>
			 
              <form method="post" id="upload_form" enctype="multipart/form-data">
                
                
                
                
              </form>
              
            </div>
            <div class="table-responsive" id="process_area">

            </div>
          </div>
        </div>
     
     


	<?php 
                
                require_once('config.inc.php');
		require_once('db.cls.php');
		require_once('db.inc.php');
		$qry="SELECT employeetab.EmpCode, employeetab.EmpName, deptab.DepName, 
		DATE_FORMAT( FROM_DAYS( DATEDIFF( now( ) , employeetab.DateOfBirth ) ) , '%Y' ) +0 AS Age,
		DATE_FORMAT( FROM_DAYS( DATEDIFF( now( ) , employeetab.DateOfJoin ) ) , '%y/%m' ) AS Experience
		FROM employeetab
		INNER JOIN deptab
WHERE employeetab.DepCode = deptab.DepId";
                $res1=$db->runQuery($qry);
                
               
		if(!$res1)
                {
		echo "error";
                }
                else
                {
					 ?>
					 
			
					 
					 <div class="panel panel-default">
          
     
     
					 
					 <table id="tbstyle">
						<tr class="panel-h"><th>Employee Code</th><th>Employee Name</th>
						<th>Department</th><th>Age</th><th>Experience in the<br>Organization[Years/Months]</th></tr>
						
					<?php
                   
				     $arr=mysqli_fetch_array($res1);
					 if(count($arr)==0)
					 {
						 echo '<style type="text/css">
									#tbstyle{ display:none; }
								</style>';
						 echo "<h2 align='center'>No Employees to show</h2>";
					 }
					 else
					 {
						 echo '<style type="text/css">
									#tbstyle{ display:true; }
								</style>';
						 while($arr=mysqli_fetch_array($res1))
						 {
						 echo "<tr><td>".$arr['EmpCode']."</td><td>".$arr["EmpName"]."</td><td>".
						$arr["DepName"]."</td><td>".$arr["Age"]."</td><td>".$arr["Experience"]."</td>
						</tr>";
						 }
					 }
				
                    
					?>
					</table>
					<?php
				}
		?>     
	
	</div>
   </body>
</html>