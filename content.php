<?php require_once('includes/connection.php'); ?>

<?php include('includes/header.php'); ?>
<div class="container">
			<div class="container-fluid staff_body">
				<div class="col-md-3 staff-left">
					<?php
						$subject_set = mysql_query("SELECT * FROM subjects", $connection);
						if (!$subject_set) {
							die("Database query failed: ". mysql_error());
						}
						echo "<ul class='list-group staff-list'>";
						while ($subject = mysql_fetch_array($subject_set)) {
							echo "<li class='list-group-item staff-list'>{$subject["menu_name"]}";
							

							$page_set = mysql_query("SELECT * FROM pages WHERE subject_id = {$subject["id"]}");

							if (!$page_set) {
								die("Database query failed: " . mysql_error());
							}
							echo "<ul>";
							while($page = mysql_fetch_array($page_set)){
								echo "<li>{$page['menu_name']} </li>";
							}
							echo "</ul>";
						}


					?>
				</div>
				<div class="col-md-9 staff-right">

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

