<?php

//upload.php

session_start();

$error = '';

$html = '';

if($_FILES['file']['name'] != '')
{
 $file_array = explode(".", $_FILES['file']['name']);

 $extension = end($file_array);

 if($extension == 'csv')
 {
  $file_data = fopen($_FILES['file']['tmp_name'], 'r');

  $file_header = fgetcsv($file_data);

  $html .= '<table class="table table-bordered"><tr>';

  for($count = 0; $count < count($file_header); $count++)
  {
   $html .= '
   <th>
    <select name="set_column_data" class="form-control set_column_data" data-column_number="'.$count.'">
     <option value="">Select a Header</option>
     <option value="emp_code">Employee Code</option>
     <option value="emp_name">Employee Name</option>
     <option value="dep">dep</option>
	 <option value="dob">dob</option>
	 <option value="doj">doj</option>
    </select>
   </th>
   ';
  }

  $html .= '</tr>';

  $limit = 0;

  $r = 0;
  
  $cl = 0;
  
  while(($row = fgetcsv($file_data)) !== FALSE)
  {
	  $r++;
   $limit++;

   
    $html .= '<tr>';
	$c1=0;
    for($count = 0; $count < count($row); $count++)
    {
     $html .= '<td>'.$row[$count].'</td>';
	 $c1++;
    }

    $html .= '</tr>';
   

   $temp_data[] = $row;
  }
  if($r > 20 || $c1 <5)
  {
	 $error = 'This file has '.$r.' number of rows and '.$c1.' number of columns.<br>Please select a CSV file with maximum of <b> 20 rows</b> and minimum of <b> 5 columns</b>'; 
  }
  else
  {
	  
  $_SESSION['file_data'] = $temp_data;

  $html .= '
  </table>
  <br />
  <div align="right">
   <button type="button" name="import" id="import" class="btn btn-success" disabled>Import</button>
     </div>
  <br />
  ';
  }
 }
 else
 {
  $error = 'Only <b>.csv</b> file allowed';
 }
}
else
{
 $error = 'Please Select CSV File';
}

$output = array(
 'error'  => $error,
 'output' => $html
);

echo json_encode($output);


?>

