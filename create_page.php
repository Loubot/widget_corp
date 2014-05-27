<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php require_once('includes/session.php'); ?>
<?php confirm_logged_in(); ?>
<?php
	if (isset($_POST['submit'])) {
		$id = $_POST['subj'];
		$errors = validate_page_form($_POST);
		if (empty($errors)) {
			$menu_name = mysql_prep($_POST['menu_name']);
			$content = mysql_prep($_POST['content']);
			$position = mysql_prep($_POST['position']);
			$visible = mysql_prep($_POST['visible']);
			$query = "INSERT INTO
								pages
								(menu_name, position, visible, content, subject_id
								) VALUES (
								'{$menu_name}', {$position}, {$visible}, '{$content}', {$id})";
			echo $query;
			$result = mysql_query($query, $connection);
		}else{
			foreach ($errors as $key) {
				echo $key . "<br>";
			}
		}
	}else{
		$id = $_GET['subj'];
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
							<form action="create_page.php" id='create_page_form' method="post">
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
														$pages = get_pages_for_subjects($id);
														$count = mysql_num_rows($pages);
														for ($i=1; $i <= $count +1; $i++) { 
															echo "<li><a class='edit_dropdown' value='{$i}'	name='position' href='#'>{$i}</a></li>";														
														}														
													?>
												</ul>
											</div> <!-- end of input-group-btn -->
										</div> <!-- end of input-group -->
									</div> <!-- end of col-md-12 col-xs-12 col-sm-12 -->
								</div> <!-- end of row -->
								<div class="row">
									<div class="col-md-12 col-xs-12 col-sm12">
										<div class="btn-group" data-toggle="buttons">
											<label class="btn btn-default active">
												<input type="radio" value="1" class="create_page_visibility" >Visible
											</label>
											<label class="btn btn-default">
												<input type="radio" value="0" class="create_page_visibility" >Invisible
											</label>
											<input name="visible" id="visibility_value" type="hidden">
										</div>
									</div>
								</div>
								<input type="hidden" name="subj" value="<?php echo $id ?>">
								<input type="submit" name="submit" id='create_page_submit' value="Create Page" class="btn btn-success">

							</form>
						</div>
					</div>
				</div>
			</div>


<?php include('includes/footer.php'); ?>