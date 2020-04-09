<?php 
require_once('../class/Item.php');
if(isset($_POST['data'])){
	$data = json_decode($_POST['data'], true);

	
	$iN  = $data[0]; 		
	$sN  = $data[1];	
	$mN  = $data[2];	
	$b   = $data[3]; 			
	$a   = $data[4]; 			
	$pD  = $data[5]; 		
	$eID = $data[6]; 		
	$cID = $data[7]; 			
	$coID= $data[8]; 
	$iID = $data[9];

	$result['valid'] = $item->update_item($iN, $sN, $mN, $b, $a, $pD, $eID, $cID, $coID, $iID);
	if($result['valid']){
		$result['msg'] = 'Data Updated Successfully!';
		echo json_encode($result);
	}

}
$item->Disconnect();
 ?>

					