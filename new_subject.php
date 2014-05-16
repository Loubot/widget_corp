
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
					<div class='container form-container'>
						<div class='container-fluid form-fluid-container'>
							<div class='col-md-4 form-parent' >
								<div class='panel panel-default form-panel'>
									<div class="panel-heading">
										<h3 class="panel-title">Add Subject</h3>
									</div> <!-- end of panel-heading -->
								<form action="create_subject.php" id="subject_form" class='subject_form' method="post">
									
									<div class='row'>
										<div class='col-xs-12 col-sm12 col-md-12'>
											<div class="form-group subject-input">
												<input type="text" class="form-control" name='menu_name' id="menu_name" value="" placeholder="Subject name">
											</div>
										</div>
									</div>
									<div class='input-group'>
										<div class="input-group-btn">
											
											<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Position<span class="caret"></span></button>
											<ul class="dropdown-menu">
												<?php 
													$subject_set = get_all_subjects();
													$subject_count = mysql_num_rows($subject_set);
													for ($count=1; $count <= $subject_count+1; $count++) { 
														echo "<li><a href='#' name = 'position' value={$count}>". $count . "</a></li>";
													}
												?>
											</ul>
										</div> <!-- end of input-group-btn -->
									</div> <!-- end of input-group -->
									<div class='row'>
										<div class='col-xs-12 col-sm12 col-md-12'>
											<div class="form-group">
												<div class="btn-group visibility-buttons" data-toggle="buttons">
													<label class="btn btn-default ">
														<input type="radio" class="visibility-button" name="visible" value="0" >Visible
													</label>
													<label class="btn btn-default">
														<input type="radio" name="visible" value="1" >Invisible
													</label>
												</div> <!-- end of btn-group -->
											</div> <!-- end of row -->
										</div> <!-- end of sizing -->
									</div> <!-- end of form-group -->

									<button type="submit" id="new_subject_submit" class="btn btn-default btn-block">Submit</button>
										
								</form>
							</div> <!-- end of panel-default -->
							</div> <!-- end of form-parent -->
						</div> <!-- end of form-fluid-container -->
					</div> <!-- end of form-container -->
					
					






<?php include('includes/footer.php'); ?>

