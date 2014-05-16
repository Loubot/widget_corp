
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php include('includes/header.php'); ?>
<?php	find_selected_page();	?>
<div class="container staff-container">
			<div class="container-fluid staff_body">
				<div class="col-md-3 staff-left">
					<?php
						navigation($sel_subject, $sel_page);

						echo "<a href='new_subject.php' class='list-group-item list-group-item-info'>Add a new subject</a>";
						echo "</div>"; //end of out list-group

						


					?>
				</div>
				<div class="col-md-9 staff-right">

					<div class="panel panel-default panel-primary">
						<div class="panel-heading">Staff menu</div>
						<div class="panel-body">Welcome to the staff area</div>
					</div> <!-- end of panel-default -->
					<?php
						if (!is_null($sel_subject)) {
							echo "<div class='panel panel-default'>";
								echo "<div class='panel-heading'>";
									echo "<h2 class='panel-title'>{$sel_subject['menu_name']}</h2>";
							
						}elseif (!is_null($sel_page)) {
							echo "<div class='panel panel-default'>";
								echo "<div class='panel-heading'>";
									echo "<h2 class='panel-title'>{$sel_page['menu_name']}</h2>";
								echo "</div>"; //end of panel-heading
								echo "<div class='panel-body'>";
									echo "{$sel_page['content']}";
								echo "</div>"; //end of panel-body
							echo "</div>"; //end of panel_default
							
						}else{
							echo "<h2>Select a subject or page to edit</h2>";
						}
						
					?>

<?php include('includes/footer.php'); ?>

