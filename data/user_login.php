<?php 
require_once('../class/Login.php');

if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);
	$un = $data[0];
	$pwd = md5($data[1]);

	$login->set_un_pwd($un, $pwd);//setter
	$user_exist = $login->check_user();
	$result['valid'] = false;

	// print_r($user_exist);

	// echo $user_exist['type_id'];


	if($user_exist > 0){
		// echo 'allright';
		$result['valid'] = true;
		if($user_exist['type_id'] == 1){
			//1 means normal emp or user
			$_SESSION['user_logged_in'] = $user_exist['emp_id'];
			$result['url'] = 'user/item-owned.php';
		}else{
			//2 means admin 
			$_SESSION['admin_logged_in'] = $user_exist['emp_id'];
			$result['url'] = 'admin/item.php';
		}
	}else{
		// echo 'invalid user';
		$result['msg'] = "Invalid username or password";
	}
	echo json_encode($result);

}

$login->Disconnect();