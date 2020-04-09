<?php 
require_once('../class/Employee.php'); 
$employees = $employee->get_employees(true);
// echo '<pre>';
// 	print_r($employees);
// echo '</pre>';
?>

<br />
<table id="myTable-employee" class="table table-bordered table-hover" cellspacing="0" width="100%">
	<thead>
	    <tr>
	        <th>Employee Name</th>
	        <th>Position</th>
	        <th>Office</th>
	        <th><center>Action</center></th>
	    </tr>
	</thead>
    <tbody>
		<?php 
			foreach ($employees as $emp) {
				$mN = $emp['emp_mname'];
				$mN = $mN[0].'.';
				$fullName = $emp['emp_fname'].' '.$mN.' '.$emp['emp_lname'];
				$pos = $emp['pos_desc'];
				$off = $emp['off_desc'];
				$work_here = $emp['emp_at_deped'];
				$emp_id = $emp['emp_id'];
		?>
			<tr>
				<td <?php echo $work_here ? 'class="text-success"':'class="text-danger"'; ?> 
					onclick="employee_profile('<?php echo $emp_id; ?>');"><?php echo $fullName; ?>
				</td>

				<td <?php echo $work_here ? 'class="text-success"':'class="text-danger"'; ?> 
					onclick="employee_profile('<?php echo $emp_id; ?>');"><?php echo $pos; ?>
				</td>
				
				<td <?php echo $work_here ? 'class="text-success"':'class="text-danger"'; ?> 
					onclick="employee_profile('<?php echo $emp_id; ?>');"><?php echo $off; ?>
				</td>

				<td align="center" width="180px">
							<button type="button" onclick="edit_employee_fill('<?php echo $emp_id; ?>');" class="btn btn-warning btn-xs" <?php echo $work_here ? '':'disabled'; ?> >
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							Edit</button>
					<?php 

						if(!$work_here){
					?>
							<!-- <button type="button" class="btn btn-success btn-xs" onclick="employee_remove_undo('undo','<?php echo $emp_id; ?>')">
							<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
							Undo&nbsp;</button> -->
					<?php
						}else{
					?>
							<button type="button" class="btn btn-danger btn-xs" onclick="employee_remove_undo('remove','<?php echo $emp_id; ?>')">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							Delete</button>
					<?php		
						}//end if else of $work_here
					 ?>
					
				</td>
			</tr>
		<?php
			}//end foreach employees
		 ?>
    </tbody>
</table>


<?php 
// $db->Disconnect();
 ?>

<!-- for the datatable of employee -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#myTable-employee').DataTable();
	});
</script>
