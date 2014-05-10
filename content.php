<?php
	//Create a database connection
	$connection = mysql_connect("localhost", 'root', "pass");
	if (!$connection) {
		die("Database connection failed: " .mysql_error());
	}
	//select a database to use
	$db_select = mysql_select_db("widget_corp", $connection);
?>
<?php include('includes/header.php'); ?>
					<div class="panel panel-default panel-primary">
						<div class="panel-heading">Staff menu</div>
						<div class="panel-body">Welcome to the staff area</div>
					</div> <!-- end of panel-default -->
					<div class="list-group">
						<a href="#" class="list-group-item"><u>Manage Website Content</u></a>
						<a href="#" class="list-group-item"><u>Add Staff User</u></a>
						<a href="#" class="list-group-item"><u>Logout</u></a>					
					</div> <!-- end of list-group -->
<?php include('includes/footer.php'); ?>