<?php 
require_once('../class/Request.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];

	//status sa item table update to 4 and request done is 1 or done.
	//para ma view na sad siya og balik did2 sa owners item list, og mawala siya 
	// sa request list
	$result = $request->request_done($item_id);
}

$request->Disconnect();