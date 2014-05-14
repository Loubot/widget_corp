
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
					<form action="create_subject.php" id="subject_form" method="post">
						<fieldset>
						<legend>Add Subject</legend>
						<div class="input-group subject-input">
							<input type="text" class="form-control" name='menu_name' id="menu_name" value="" placeholder="Subject name">
						</div>
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
							</div>
							<div class="btn-group visibility-buttons" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="visible" value="0" >Visible
								</label>
								<label class="btn btn-default">
									<input type="radio" name="visible" value="1" >Invisible
								</label>
							</div> <!-- end of btn-group --><br>
							<button type="submit" id="submit" class="btn btn-default">Submit</button>
							</fieldset>
					</form>
					
					

<?php include('includes/footer.php'); ?>
