
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php include('includes/header.php'); ?>
<?php find_selected_page();	?>
<div class="container staff-container">
			<div class="container-fluid staff_body">
				<div class="col-md-3 staff-left">
					<?php navigation($sel_subject, $sel_page);
						echo '</div>'; //end of outer list-group
					 ?>

				</div>
				<div class="col-md-9 staff-right">

					
					

<?php include('includes/footer.php'); ?>
