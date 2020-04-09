<?php 
require_once('../class/Request.php');
if(isset($_POST['action'])){
	$status_id = $_POST['action'];
	$req_id = $_POST['req_id'];
	$item_id = $_POST['item_id'];
	$req_type = $_POST['req_type'];

	$result = $request->update_request($req_id, $status_id, $item_id, $req_type);
	// echo $result;

}

$request->Disconnect();