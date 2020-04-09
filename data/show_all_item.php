<?php 
require_once('../class/Item.php'); 
$allItem = $item->get_all_items();
// echo '<pre>';
// 	print_r($allItem);
// echo '</pre>';
?>

<br />
<table id="myTable" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Item Name</th>
	        <th>Owner</th>
	        <th>Office</th>
	        <th>Category</th>
	        <th>Condition</th>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($allItem as $i) {
				# code...
				$fN = $i['emp_fname'];
				$mN = $i['emp_mname'];
				$mN = $mN[0].'.';
				$lN = $i['emp_lname'];
				$fullName = "$fN $mN $lN";
				$fullName = ucwords($fullName);
		?>
			<tr>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo $i['item_name']; ?></td>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo $fullName; ?></td>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($i['off_desc']); ?></td>
				<td onclick="item_profile('<?php echo $i['item_id']; ?>');"><?php echo ucwords($i['cat_desc']); ?></td>
				<td <?php $cond = $i['con_id']; if($cond == 1){echo 'class="text-success"';} if($cond == 2){echo 'class="text-danger"';}?>
				onclick="item_profile('<?php echo $i['item_id']; ?>');">
					<strong>
						<?php echo ucfirst($i['con_desc']); ?>
					</strong>
				</td>
				<td align="center">
					<button onclick="fill_update_modal('<?php echo $i['item_id']; ?>');" class="btn btn-warning btn-sm"
					id="btn-edit"<?php if($cond != 1){echo 'disabled';} ?>>
					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
					Edit
					</button>
					<button class="btn btn-success btn-sm" onclick="item_profile('<?php echo $i['item_id']; ?>');">
					<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
					View
					</button>
				</td>
			</tr>
		<?php		
			}//end foreach
		 ?>
    </tbody>
</table>


<?php 
$item->Disconnect();
 ?>

<!-- for the datatable of item -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable').DataTable();
	});




</script>
