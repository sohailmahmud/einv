<?php 
require_once('../class/Employee.php'); 

$positions = $employee->employee_positions();
$offices = $employee->employee_offices();
$account_types = $employee->employee_account_types();

?>
<div class="modal fade" id="modal-add-employee">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Employee</h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>System:</strong>
					<span id="system-msg-add-emp">Default Username and Password is your firstname_lastname</span>
				</div>
					<form class="form-horizontal" role="form" id="add-employee-form">

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="fN">First Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="fN" placeholder="Enter First Name" autofocus>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="mN">Middle Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="mN" placeholder="Enter Middle Name">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="lN">Last Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="lN" placeholder="Enter Last Name">
					    </div>
					  </div>


				      <div class="form-group">
					    <label class="control-label col-sm-3" for="position">Position:</label>
					    <div class="col-sm-9">
					      <select class="btn btn-default" id="position">
					      	<?php 
					      		foreach ($positions as $pos) {
					      			# code...
					      			$pos_id = $pos['pos_id'];
					      			$pos_desc = $pos['pos_desc'];
					      	?>
					      		<option value="<?php echo $pos_id; ?>"><?php echo $pos_desc; ?></option>
					      	<?php		
					      		}//end foreach
					      	 ?>
					      </select>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="position">Office:</label>
					    <div class="col-sm-9">
					      <select class="btn btn-default" id="office">
					      	<?php 
					      		foreach ($offices as $off) {
					      			# code...
					      			$off_id = $off['off_id'];
					      			$off_desc = $off['off_desc'];
					      	?>
					      		<option value="<?php echo $off_id; ?>"><?php echo $off_desc; ?></option>
					      	<?php		
					      		}//end foreach
					      	 ?>
					      </select>
					    </div>
					  </div>

					    <div class="form-group">
					    <label class="control-label col-sm-3" for="position">Account Type:</label>
					    <div class="col-sm-9">
					      <select class="btn btn-default" id="type">
					      	<?php 
					      		foreach ($account_types as $ac) {
					      			# code...
					      			$type_id = $ac['type_id'];
					      			$type_desc = $ac['type_desc'];
					      	?>
					      		<option value="<?php echo $type_id; ?>"><?php echo $type_desc; ?></option>
					      	<?php		
					      		}//end foreach
					      	 ?>
					      </select>
					    </div>
					  </div>

					  <div class="form-group"> 
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary" value="addEmployee">Save
					      <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>
					      </button>
					    </div>
					  </div>
					</form>
				<!-- /main form -->
			</div>
		</div>
	</div>
</div>
