<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php
	if (isset($_POST['submit'])) {
		echo $sel_subject; 
	}
?>

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
			<div class="container">
				<div class="container-fluid">
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3>Create Page</h3>
							</div>
							<form action="create_page.php" method="post">
								<div class="row">
									<div class="col-md-12 col-xs-12 col-sm-12">
										<div class="input-group">
											<input type="text" class="form-control" name="menu_name" value="" placeholder="Page Name">
											<span class="input-group-addon">Title</span>
										</div> <!-- end of input-group -->
									</div> <!-- end of "col-md-12 col-xs-12 col-sm-12 -->
								</div> <!-- end of row -->
								<div class="row">
									<div class="col-md-12 col-xs-12 col-sm-12">
										<div class="input-group">
											<textarea type="text" class="form-control" name="content" value="" placeholder="Content"></textarea>
											<span class="input-group-addon">Content</span>
										</div> <!-- end of input-group -->
									</div> <!-- end of col-md-12 col-xs-12 col-sm-12 -->
								</div> <!-- end of row -->
								<div class="row">
									<div class="col-md-12 col-xs-12 col-sm-12">
										<div class="input-group">
											<div class="input-group-btn">
												<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Position
													<span class="caret"></span>
												</button>
												<ul class="dropdown-menu">
													<?php
														$pages = get_pages_for_subjects($_GET['subj']);
														$count = mysql_num_rows($pages);
														for ($i=1; $i <= $count +1; $i++) { 
															echo "<li>{$i}</li>";														
														}														
													?>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<input type="hidden" name="subj" value="<?php echo $_GET['subj']; ?>">
								<input type="submit" name="submit" value="Create Page" class="btn btn-success">
							</form>
						</div>
					</div>
				</div>
			</div>


<?php include('includes/footer.php'); ?>