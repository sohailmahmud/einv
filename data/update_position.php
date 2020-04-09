<?php 
require_once('../class/Position.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);
	$pid = $data[0];
	$desc = $data[1];

	$res = $position->update_position($pid, $desc);
	if($res == 1){
		$result['valid'] = true;
		$result['msg'] = 'Position Updated Successfully!';
		echo json_encode($result);
	}
}

$position->Disconnect();