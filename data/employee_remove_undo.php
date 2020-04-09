<?php 
require_once('../class/Employee.php');

if(isset($_POST['emp_at_deped'])){
	$emp_at_deped = $_POST['emp_at_deped'];
	$eid = $_POST['eid'];

	// $result = $employee->employee_remove_undo($emp_at_deped, $eid);
	
	$result['valid'] = $employee->employee_remove_undo($emp_at_deped, $eid);
	if($result['valid']){
		$result['msg'] = 'success';
		echo json_encode($result);
	}


	// $result['msg'] = 'success';
	// echo json_encode($result);
	// echo $result;
}

$employee->Disconnect();



