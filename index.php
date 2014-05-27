<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/header.php'); ?>
<?php find_selected_page(); ?>
<div class="container staff-container">
	<div class="container-fluid staff_body">
		<div class="col-md-3 staff-left">
			<?php
				echo public_navigation($sel_subject, $sel_page);

				
				echo "</div>"; //end of out list-group
			?>
		</div> <!-- end of staff-left -->

		<div class="col-md-9 staff-right">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<?php
						if ($sel_page == NULL && $sel_subject == NULL) {
							echo "<div class='page-header'><h1>Please select something<h1></div>";
						}elseif ($sel_page != NULL) {
							echo "<div class='page-header'><h1>".	$sel_page['menu_name'] . "</h1></div>".
							"<div>". $sel_page['content'] . "</div>";
						}else{
							echo "<div class='page-header'><h1>" . $sel_subject['menu_name'] . "</h1></div>";
						}
					?>
				</div>
			</div>



<?php include('includes/footer.php'); ?>		