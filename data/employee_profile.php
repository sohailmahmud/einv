<?php 
require_once('../class/Employee.php');

if(isset($_POST['eid'])){
	$eid = $_POST['eid'];

	$result = $employee->get_employee($eid);
	if($result){
		echo json_encode($result);
	}
}

$employee->Disconnect();