<?php require_once('includes/connection.php'); ?>
<?php require_once('includes/functions.php'); ?>
<?php echo headers_sent(); ?>
<?php
	
	
	if (isset($_POST['submit'])) {
		$errors = validate_page_form($_POST);
		if (empty($errors)) {
			$menu_name = mysql_prep($_POST['menu_name']);
			$visible = mysql_prep($_POST['visible']);
			$position = $_POST['position'];
			
			$content = mysql_prep($_POST['content']);
			$id = mysql_prep($_GET['page']);
			$query = "UPDATE pages SET
								menu_name = '${menu_name}',
								visible = {$visible},
								position = {$position},
								content = '{$content}'
								WHERE id = {$id}";
			$result = mysql_query($query, $connection);
			if (mysql_affected_rows() == 1) {
				$message = "The page was updated successfully";
				
				redirect_to('content.php');
			}
		}else{
			
			foreach ($_POST as $key => $value) {
				// echo "{$key}: {$value} <br>";
			}
		}
	}
	
?>
<?php $page = get_page_by_id($_GET['page']); ?>
<?php	find_selected_page();	?>
<?php include('includes/header.php'); ?>
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
									<form action="edit_page.php?page=<?php echo $_GET['page']; ?>" class='form-horizontal' id='edit_page_form' method='post'>
										<div class='row'>
											<div class='col-xs-12 col-sm-12 col-md-12'>
												<div class='input-group'>
													<input type='text' class='form-control' name='menu_name' value="<?php echo $sel_page['menu_name'] ?>" placeholder="<?php echo $sel_page['menu_name']; ?>">
													<span class="input-group-addon">Heading</span>
												</div>
											</div>
										</div>
										<div class='row'>
											<div class='col-xs-12 col-sm-12 col-md-12'>
												<div class='input-group'>
													<input type='text' class='form-control' name='content' value="<?php echo $sel_page['content'] ?>" placeholder="<?php echo $sel_page['content']; ?>">
													<span class="input-group-addon">Content</span>
												</div> <!-- end of input group -->
											</div> <!-- end of col-xs-12 -->
										</div> <!-- end of row -->
										<div class='row'>
											<div class='col-xs-12 col-sm-12 col-md-12'>
												<div class='input-group'>
													<div class='input-group-btn'>
														<button type='button' class='btn btn-default dropdown-toggle' data-toggle='dropdown'>
															<?php echo $sel_page['position']; ?><span class='caret'></span>
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
												<div class='col-xs-12 col-sm-12 col-md-12'>
													<div class='btn-group visiblity' id="visibility-radio" data-toggle='buttons'>
														<label class="btn btn-default <?php 
																if($sel_page['visible'] == 1){echo 'active';}
																?>">
															<input type="radio" name="visible" class='visibility' value="1">Visible
														</label>
														<label class="btn btn-default <?php 
																if($sel_page['visible'] == 0 ){echo 'active';}
																?>">
															<input type="radio" name="visible" class="visibility" value="0">Invisible
														</label>
													</div> <!-- end of btn-group -->
												</div> <!-- end of col-xs-12 col-sm12 col-md-12 -->
											</div> <!-- end of row -->
										<input type='submit' id='edit_page_submit' name='submit' value='Update page' class='btn btn-info'>
									</form> <!-- end of edit page form -->									
								</div> <!-- end of panel-default -->
							</div> <!-- end of form-parent -->
						</div> <!-- end of form-fluid-container -->
					</div> <!-- end of form-container -->	
					
					
					
<?php include('includes/footer.php'); ?>
