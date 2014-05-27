<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php confirm_logged_in(); ?>
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
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<?php
								if ($sel_page == NULL && $sel_subject == NULL) {
									echo "<div class='page-header'><h1>Please select something<h1></div>";
								}elseif ($sel_page != NULL) {
									echo "<div class='page-header'><h1>".	$sel_page['menu_name'] . "</h1></div>".
									"<div>". strip_tags(nl2br($sel_page['content']), "<br><a><b>") . "</div>";
								}else{
									echo "<div class='page-header'><h1>" . $sel_subject['menu_name'] . "</h1></div>";
								}
							?>
						</div> <!-- end of col-xs-12 col-sm-12 col-md-12 -->
					</div> <!-- end or row -->

<?php include('includes/footer.php'); ?>

