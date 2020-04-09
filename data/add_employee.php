<?php 
require_once('../class/Employee.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);
	$fN = $data[0];
	$mN = $data[1];
	$lN = $data[2];
	$pos = $data[3];
	$off = $data[4];
	$type = $data[5];

	$result['valid'] = $employee->insert_employee($fN, $mN, $lN, $pos, $off, $type);
	if($result['valid']){
		$result['msg'] = 'New Employee Added Successfully!';
		echo json_encode($result);
	}//end
	// echo 'wtf';
}


$employee->Disconnect();
 ?>


