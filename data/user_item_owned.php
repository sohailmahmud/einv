<?php 
require_once('../class/Employee.php');

$item_owned = $employee->item_owned();

// echo '<pre>';
// 	print_r($item_owned);
// echo '</pre>';

/*
*ang e display ra niya is ang row sa item nga ang emp na belong sa naka login nga user
*og ang status_id niya is 4, see DB value equivalent sa 4 
*/

?>

<table id="myTable-item-owned" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Item Name</th>
	        <th>Brand</th>
	        <th>Category</th>
	        <th><center>Request</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($item_owned as $owned) {
				$iID = $owned['item_id'];
				$name = $owned['item_name'];
				$brand = $owned['item_brand'];
				$cat = $owned['cat_desc'];
				$status = $owned['status_desc'];
				$stat_id = $owned['status_id'];
		?>
			<tr>
				<td><?php echo $name; ?></td>
				<td><?php echo $brand; ?></td>
				<td><?php echo $cat; ?></td>
				<td align="center">
					
					<button type="button" class="btn btn-info btn-sm" onclick="request('<?php echo $iID; ?>', '1');">
					<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
					Repair</button>

					<button type="button" class="btn btn-warning btn-sm" onclick="request('<?php echo $iID; ?>', '2');">
					<span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
					Transfer</button>

					<button type="button" class="btn btn-danger btn-sm" onclick="request('<?php echo $iID; ?>', '3');">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
					Condemed</button>
					
				</td>
			</tr>
		<?php
			}//end foreach
		 ?>
    </tbody>
</table>


<?php 
$employee->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-item-owned').DataTable();
	});
</script>