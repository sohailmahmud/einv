<?php 
require_once('../class/Request.php');

$requests = $request->all_owners_request();

// echo '<pre>';
// 	print_r($requests);
// echo '</pre>';

?>

<br />
<table id="myTable-owners-request" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Item Name</th>
	        <th>Request Date</th>
	        <th>Request</th>
	        <th>Status</th>
	        <th>
	        	<center>Confirmed</center>
	        </th>
	    </tr>
	</thead>
    <tbody>
    	<?php 
    		foreach ($requests as $req) {
    			$item_id = $req['item_id'];
    			$itemName = $req['item_name'];
    			$date = $req['req_date'];
    			$req_type = $req['req_type_desc'];
    			$req_status = $req['req_status_desc'];
    			$req_type_id = $req['req_type_id'];

    			$req_status_id = $req['req_status_id'];

    			$class = '';
    			$btn_class = '';
    			switch ($req_type_id) {
    				case 1:
    					$class = 'class="text-primary"';
    					$btn_class = 'btn-primary';
    					break;
    				case 2:
    					$class = 'class="text-success"';
    					$btn_class = 'btn-success';
    					break;
    				case 3:
    					$class = 'class="text-danger"';
    					$btn_class = 'btn-danger';
    					break;
    				default:
    					# break dance ahaha
    					break;//glass incase of emergency
    			}

    			$btn_is = $req_status_id == 1 ? 'disabled':'';
    	?>


			<tr <?php echo $class; ?>>
				<td><?php echo $itemName; ?></td>
				<td><?php echo $date; ?></td>
				<td><?php echo $req_type; ?></td>
				<td><strong><?php echo $req_status == 'pending' ? $req_status.'...':$req_status; ?></strong></td>
				<td align="center">
				<?php 
					if($req_status_id != 1){
				?>
				
				<!-- makita rani nga button if e done sa admin ang req_is_done nga column -->
				<button type="button" <?php echo $btn_is; ?> class="btn btn-sm <?php echo $btn_class; ?>" onclick="confirm_done('<?php echo $item_id; ?>');">
					Done
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
					</button>
				</td>

				<?php		
					}//end if $req_status
				 ?>

			</tr>

    	<?php		
    		}//end foreach
    	 ?>
    </tbody>
</table>


<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-owners-request').DataTable();
	});
</script>

<?php 
$request->Disconnect();

