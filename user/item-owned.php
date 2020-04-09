<?php 
include_once('../data/user_session.php');//check if naay session otherwise e return sa login
include_once('../include/header.php'); 
include_once('../include/banner.php'); 
?>

  <nav class="navbar navbar-inverse" style="margin-top:-18px;">
  	<div class="container-fluid">
   	 
  	  <ul class="nav navbar-nav">
  	    <li>
          <a href="dashboard.php"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a>
        </li>

         <li class="active">
          <a href="item-owned.php"><span class="glyphicon glyphicon-th-list"></span> Item's Owned</a>
        </li>

         <li>
          <a href="request.php"><span class="glyphicon glyphicon-tag"></span> Request</a>
        </li>

  	  </ul>
  	  <ul class="nav navbar-nav navbar-right">
  	     <li class="dropdown">
            <a class="dropdown-toggle" id="user-account" data-toggle="dropdown" href="#"></a>

    	      <ul class="dropdown-menu">
    	        <li><a href="#modal-changepass" id="change-password-button" data-toggle="modal">Change Password</a></li>
    	        <li><a href="../data/user_logout.php">Logout</a></li>
    	      </ul>
 	     </li>
 	   </ul>
 	 </div>
	</nav>

	<div id="right_content" >
		<div class="panel-group">
 			 <div class="panel panel-primary">

 			 	<div class="panel-heading">
        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
        Item's Own</div>
  	  			<div class="panel-body">
              <!-- main content -->
                <div id="item-owned"></div>
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


<?php require_once('../include/footer-user.php'); ?>

</body>
</html>	

