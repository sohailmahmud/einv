<?php 
require_once('../class/Item.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	$iN = ucwords($data[0]);
	$sN = $data[1];
	$mN = $data[2];
	$b = ucwords($data[3]);
	$a = $data[4];
	$pD = $data[5];
	$eID = $data[6];
	$cID = $data[7];
	$coID = $data[8];


	// $result = $item->insert_item($iN, $sN, $mN, $b, $a, $pD, $eID, $cID, $coID);
	$result['valid'] = $item->insert_item($iN, $sN, $mN, $b, $a, $pD, $eID, $cID, $coID);
	if($result['valid']){
		$result['msg'] = "Item Added Successfully!";
		$result['action'] = "Add Data";
		echo json_encode($result);
	}
	// echo $result;
}

$item->Disconnect();
 ?>

