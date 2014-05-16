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


<?php include('includes/footer.php'); ?>
