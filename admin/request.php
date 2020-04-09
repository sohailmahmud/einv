<?php 
include_once('../data/admin_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); ?>
<?php include_once('../include/banner.php'); ?>

  <nav class="navbar navbar-inverse" style="margin-top:-18px;">
  	<div class="container-fluid">
   	 
  	  <ul class="nav navbar-nav">
  	    <li>
          <a href="index.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
        </li>
     
  	    <li>
          <a href="item.php"><span class="glyphicon glyphicon-object-align-vertical"></span> Item
          </a>
        </li>
  	    
  	    <li>
          <a href="employee.php"><span class="glyphicon glyphicon-user"></span> Employee</a>
        </li>

        <li>
          <a href="position.php"><span class="glyphicon glyphicon-tasks"></span> Position</a>
        </li>

        <li>
          <a href="office.php"><span class="glyphicon glyphicon-home"></span> Office</a>
        </li>

  	    <li class="active">
          <a href="request.php"><span class="glyphicon glyphicon-tags"></span> Request</a>
        </li>

  	    <li>
          <a href="report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
        </li>
  	  </ul>
  	 <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
            <a class="dropdown-toggle" id="admin-account" data-toggle="dropdown" href="#">
            </a>
            <ul class="dropdown-menu">
              <li><a href="#modal-changepass" data-toggle="modal">Change Password</a></li>
              <li><a href="../data/admin_logout.php">Logout</a></li>
            </ul>
          </li>
      </ul>
 	 </div>
	</nav>

	<div id="right_content" >
		<div class="panel-group">
 			 <div class="panel panel-primary">

 			 	<div class="panel-heading">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
        Employee's Requests List</div>
  	  			<div class="panel-body">
              <!-- main content -->
                <div id="request-to-admin"></div>
              <!-- /main content -->
              <br />
  	  			</div>
 			 </div>
  
		</div>
	</div>

<!-- navigation menu -->
<?php require_once('side-menu.php'); ?>
<!-- navigation menu -->

<!-- load all modals here -->
<?php require_once('load_modals.php'); ?>
<!-- /load all modals here -->
  

</div>


<?php require_once('../include/footer.php'); ?>

</body>
</html>	

