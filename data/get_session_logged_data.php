<?php 
require_once('../class/Employee.php');
$employee->my_session_start();
$eid = $_SESSION['user_logged_in'];
// $eid = $eid['emp_id'];
$result = $employee->get_employee($eid);
echo json_encode($result);

$employee->Disconnect();