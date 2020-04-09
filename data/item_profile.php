<?php 
require_once('../class/Item.php'); 

if(isset($_POST['iID'])){
	$iID = $_POST['iID'];

	$result = $item->get_item($iID);
	echo json_encode($result);

}

$item->Disconnect();
?>