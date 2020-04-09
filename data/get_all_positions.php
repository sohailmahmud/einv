<?php 
require_once('../class/Position.php');
$pos =  $position->get_positions();
// echo '<pre>';
// 	print_r($r);
// echo '</pre>';
?>

<table id="myTable-position" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <td>Position Description</td>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
 	<tbody>
 	<?php foreach($pos as $r): ?>
 		<tr>
 			<td><?= $r['pos_desc'];?></td>
 			<td>
 				<center>
 					<button type="button" class="btn btn-warning btn-xs" onclick="fill_position('<?= $r['pos_id']; ?>');">
 					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
 					<button type="button" class="btn btn-danger btn-xs" onclick="get_pos_id('<?= $r['pos_id']; ?>','del');">
 					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
 				</center>
 			</td>
 		</tr>
 	<?php endforeach; ?>
 	</tbody>
</table>


<?php 
$position->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-position').DataTable();
	});
</script>




