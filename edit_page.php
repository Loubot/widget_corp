<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>

<?php include('includes/header.php'); ?>
<?php	find_selected_page();	?>
<?php $page = get_page_by_id($_GET['page']); ?>
<?php
	echo $_POST['visible'];
?>
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
					<div class="container form-container">
						<div class='container-fluid form-fluid-container'>
							<div class='col-md-4 form-parent'>
								<div class="panel panel-default form-panel">
									<div class='panel-heading'><h3>Edit page</h3></div>									
									<form action="edit_page.php?page=<?php echo $_GET['page']; ?>" id='edit_page_form' method='post'>
										<div class='row'>
											<div class='col-xs-12 col-sm12 col-md-12'>
												<div class='form-group'>
													<input type='text' class='form-control' name='content' value='' placeholder="<?php echo $sel_page['content']; ?>">
												</div> <!-- end of input group -->
											</div> <!-- end of col-xs-12 -->
										</div> <!-- end of row -->
										<div class='row'>
											<div class='col-xs-12 col-sm12 col-md-12'>
												<div class='input-group'>
													<div class='input-group-btn'>
														<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
															Position<span class='caret'></span>
														</button>
														<ul class='dropdown-menu' role='menu'>
															<?php
																$pages_set = get_all_subjects();
																$pages_count = mysql_num_rows($pages_set);
																for ($count=1; $count < $pages_count+1; $count++) { 
																	echo "<li><a href=# class='edit_dropdown' name='position' value={$count}>{$count}</a></li>";
																}
															?>
														</ul> <!-- end of dropdown-menu -->
														</div> <!-- end of input-group-btn -->
													</div> <!-- end of input group -->
												</div> <!-- end of col-xs-12 col-sm12 col-md-12 -->
											</div> <!-- end of row -->
											<div class='row'>
												<div class='col-xs-12 col-sm12 col-md-12'>
													<div class='btn-group' data-toggle='buttons'>
														<label class='btn btn-default' >
															<input type='radio' name='visible' class='visbility' value='1'>Visible
														</label>
													</div>
												</div>
											</div>
										<input type='submit' id='edit_page_submit' class='btn btn-info'>
									</form> <!-- end of edit page form -->									
								</div> <!-- end of panel-default -->
							</div> <!-- end of form-parent -->
						</div> <!-- end of form-fluid-container -->
					</div> <!-- end of form-container -->	
					
					
					
<?php include('includes/footer.php'); ?>
