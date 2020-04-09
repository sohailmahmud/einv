<?php 
require_once('../class/Request.php');

$results = $request->all_request_from_admin();

// echo '<pre>';
// 	print_r($results);
// echo '</pre>';

?>

<table id="myTable-request-to-admin" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <td>Employee</td>
	        <td>Item Name</td>
	        <td>Date</td>
	        <td>Request for</td>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
 	<tbody>
 	<?php foreach($results as $r):
 		$id = $r['req_id'];
 		$iid = $r['item_id'];
 		$t_id = $r['req_type_id'];
 		$req_type = $r['req_type_desc'];


 		$text_color = '';
 		switch ($t_id) {
 			case 1:
 				# repair
 				$text_color = 'class="text-primary"';
 				break;
 			case 2:
 				# transfer
 				$text_color = 'class="text-warning"';
 				break;
 			case 3:
 				# for condemed
 				$text_color = 'class="text-danger"';
 				break;
 			default:
 				# code...
 				break;
 		}
 	 ?>
 		<tr>
 			<td <?= $text_color; ?> ><?= $r['emp_fname'].' '.$r['emp_mname'][0].'.'.' '.$r['emp_lname']; ?></td>
 			<td <?= $text_color; ?> ><?= $r['item_name']; ?></td>
 			<td <?= $text_color; ?> ><?= $r['req_date']; ?></td>
 			<td <?= $text_color; ?> ><?= $req_type; ?></td>
 			<td>
 				<center>
 					<button onclick="request_action('2', '<?= $id; ?>', '<?= $iid; ?>', '<?= $req_type; ?>')" type="button" class="btn btn-success btn-sm">Accept <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
 					<button onclick="request_action('3', '<?= $id; ?>', '<?= $iid; ?>', '<?= 'reject'; ?>')" type="button" class="btn btn-danger btn-sm">Reject <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
 				</center>
 			</td>
 		</tr>
	<?php endforeach; ?>
 	</tbody>
</table>


<?php 
$request->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-request-to-admin').DataTable();
	});
</script>




