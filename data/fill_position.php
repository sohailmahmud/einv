<?php 
require_once('../class/Position.php');
if(isset($_POST['pid'])){
	$pid = $_POST['pid'];
	$res = $position->get_position($pid);
	if($res > 1){
		$result['valid'] = true;
		$result['pid'] = $res['pos_id'];
		$result['desc'] = $res['pos_desc'];;
	}else{
		$result['valid'] = false;
	}
	echo json_encode($result);
}

$position->Disconnect();