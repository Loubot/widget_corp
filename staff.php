<?php include('includes/header.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php confirm_logged_in(); ?>
<div class="container staff-container">
	<div class="container-fluid staff_body">
		<div class="col-md-3 staff-left">
			<?php
				find_selected_page();
				echo public_navigation($sel_subject, $sel_page);

				
				echo "</div>"; //end of out list-group
			?>
		</div> <!-- end of staff-left -->

		<div class="col-md-9 staff-right">
	<div class="panel panel-default panel-primary">
		<div class="panel-heading">Staff menu</div>
		<div class="panel-body">Welcome to the staff area</div>
	</div> <!-- end of panel-default -->
	<div class="list-group">
		<a href="content.php" class="list-group-item"><u>Manage Website Content</u></a>
		<a href="create_user.php" class="list-group-item"><u>Add Staff User</u></a>
		<a href="logout.php" class="list-group-item"><u>Logout</u></a>					
	</div> <!-- end of list-group -->
<?php require_once('includes/footer.php'); ?>