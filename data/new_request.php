<?php 
require_once('../class/Request.php');

if(isset($_POST['iID'])){
	$iID = $_POST['iID'];
	$pur = $_POST['pur'];

	$result = $request->new_request($iID, $pur);

	echo json_encode($result);

}

$request->Disconnect();