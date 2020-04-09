<?php 
require_once('../class/Login.php');

$admin = $login->admin_data();
// print_r($admin);

if($admin > 1){
	$result['valid'] = true;
	$result['logged'] = $admin['emp_fname'].' '.$admin['emp_lname'];
	$result['logged_un'] = $admin['emp_un'];
}else{
	$result['valid'] = false;
}
echo json_encode($result);
