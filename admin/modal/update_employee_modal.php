<?php 
require_once('../class/Employee.php'); 

$positions = $employee->employee_positions();
$offices = $employee->employee_offices();
$account_types = $employee->employee_account_types();

?>
<div class="modal fade" id="modal-update-employee">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<!-- main form -->
					<form class="form-horizontal" role="form" id="update-employee-form">
					<input type="hidden" id="update-eid">
					  <div class="form-group">
					    <label class="control-label col-sm-3" for="update-fN">First Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="update-fN" placeholder="Enter First Name" autofocus>
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="update-mN">Middle Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="update-mN" placeholder="Enter Middle Name">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-3" for="update-lN">Last Name:</label>
					    <div class="col-sm-9">
					      <input type="text" class="form-control" id="update-lN" placeholder="Enter Last Name">
					    </div>
					  </div>


				      <div class="form-group">
					    <label class="control-label col-sm-3" for="update-position">Position:</label>
					    <div class="col-sm-9">
					      <select class="btn btn-default" id="update-position">
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
					    <label class="control-label col-sm-3" for="update-office">Office:</label>
					    <div class="col-sm-9">
					      <select class="btn btn-default" id="update-office">
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
					    <label class="control-label col-sm-3" for="update-type">Account Type:</label>
					    <div class="col-sm-9">
					      <select class="btn btn-default" id="update-type">
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
