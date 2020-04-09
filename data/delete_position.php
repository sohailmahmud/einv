<?php 
require_once('../class/Position.php');

if(isset($_POST['pid'])){
	$pid = $_POST['pid'];
	$del_pos = $position->delete_position($pid);
	if($del_pos == 1){
		$result['valid'] = true;
		$result['msg'] = 'Position Deleted Successfully!';
		echo json_encode($result);
	}
}

$position->Disconnect();