<?php 
require_once('../class/Office.php');

$res =  $office->get_offices();

// print_r($res);

?>


<table id="myTable-office" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <td>Office</td>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
 	<tbody>
 	<?php foreach($res as $r): ?>
 		<tr>
 			<td><?= $r['off_desc']; ?></td>
 			<td>
 				<center>
 					<button type="button" class="btn btn-warning btn-xs" onclick="fill_office_form('<?= $r['off_id'] ?>');">
 					<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</button>
 					<button type="button" class="btn btn-danger btn-xs">
 					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
 				</center>
 			</td>
 		</tr>
 	<?php endforeach; ?>
 	</tbody>
</table>


<?php 
$office->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-office').DataTable();
	});
</script>




