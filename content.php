<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php include('includes/header.php'); ?>
<div class="container">
			<div class="container-fluid staff_body">
				<div class="col-md-3 staff-left">
					<?php
						$subject_set = get_all_subjects();

						echo "<ul class='nav nav-pills nav-stacked'>";
						while ($subject = mysql_fetch_array($subject_set)) {
							echo "<li class='list-group-item staff-list color-left'><a href='content.php?subj=".
							urldecode($subject['id']) .
							"'>{$subject["menu_name"]}</a></li>";							
							
							$page_set = get_pages_for_subjects($subject['id']);
														
							echo "<ul class= 'list-group'>";
							while($page = mysql_fetch_array($page_set)){
								echo "<li class='list-group-item color-left'><a href='content.php?page=".
								urldecode($page['id']) .
								"'>{$page['menu_name']}</a> </li>";
							}
							echo "</ul>";
						}

						echo "</ul>"


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

